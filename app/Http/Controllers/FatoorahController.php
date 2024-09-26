<?php
 namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Transaction;
use App\Services\FatoorahServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class FatoorahController extends Controller {

     private $fatoorahServices;

        public function __construct(FatoorahServices $fatoorahServices)
        {
            $this->fatoorahServices = $fatoorahServices;
        }

    public function pay(Request $request)
    {
        $cartData=[];
        $validator=FacadesValidator::make($request->all(),[
            'email' => 'required|email|max:190',
            'name' => 'required|string|max:190',
            'mobile' => 'required|integer|max:20',
            'country' => 'required|string|max:190',
            'city' => 'required|string|max:120',
            'ZIPCode' => 'required|integer|max:20',
            'state' => 'required|string|max:120',
            'address'=> 'required',
        ]);
        if($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        if (session()->has('cart')){
            $cartData =session()->get('cart');
        }else{
            return redirect()->route('shop.show');
        }
        $data = [
            "CustomerName" => 'hossam gaber hamed',
            "Notificationoption"=> "LNK",
            "Invoicevalue" =>$cartData->totalPrice,// total_price
            "CustomerEmail" => 'hossamgaber@gmail.com',
            "CalLBackUrl"=>'http://127.0.0.1:8000/api/call_back',
            "Errorurl"=> 'https://web.whatsapp.com',
            "Languagn"=> 'en',
            "DisplayCurrencyIna"=>'SAR'
        ];
        $response =$this->fatoorahServices->sendPayment($data);
        // dd($response);
        // return $response;
        if(isset($response['IsSuccess']));
        if($response['IsSuccess']==true){
            $InvoiceId  = $response['Data']['InvoiceId']  ; // save this id with your order table
            $InvoiceURL = $response['Data']['InvoiceURL'] ;
            $orderData=[
                'user_id'=> Auth::user()->id,
                'address'=> $request->address,
                'total_price'=>$cartData->totalPrice,
                'invoice_id'=> $InvoiceId ,
            ];
            $order=Order::create($orderData);
            $orderId=$order->id;
            foreach($cartData->items as $product){
                OrderDetails::create([
                    'order_id'=> $orderId,
                    'product_id'=> $product['id'],
                    'quantity'=>$product['qty'],
                    'color' => $product['color'],
                    'size' => $product['size'],
                    'unit_price'=>$product['price'],
                ]);
            }
        }
        return redirect($response['Data']['InvoiceURL']); // redirect for this link to view payment page
    }

    public function callback(Request $request)
        {
            $data=[];
            $data['key']= $request->paymentId;
            $data['KeyType']='PaymentId';
            // return $this->fatoorahServices->getPaymentStatus($data) ;

            $paymentData =$this->fatoorahServices->getPaymentStatus($data);
            $getInvoiceId =Order::select('id','invoice_id')->where('invoice_id',$paymentData['Data']['InvoiceId'])->get();
            if(count($getInvoiceId) !=0){
                Order::findOrFail($getInvoiceId[0]->id)->update([
                    'payment_status'=> '1',
                ]);
                session()->forget('cart');
                return redirect()->route('cart.show');
            }
            return 'route not valide';
        }


}
