<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\InmateDeposit;
use App\Models\InmateDepositDetail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {

        $depoAmount = InmateDeposit::where("inmate_id",auth('frontendAuth')->user()->inmate_id)->whereMonth("created_at",now()->format('m'))->pluck("id")->toArray();
        $details = InmateDepositDetail::whereIn("inmate_deposit_id",$depoAmount)->pluck("amount")->toArray();

        $totalMonthlyAmount = array_sum($details);
        if($totalMonthlyAmount >= 2000){
            notify()->error("You Deposited maximum Amount for this month");
            return to_route("frontend.visitor");
        }
        



        $depo = InmateDeposit::where('inmate_id', auth('frontendAuth')->user()->inmate_id)->first();
        $validation = null;
        if ($depo) {
            $availAmount = 2000 - $depo->available_amount;
            $validation = Validator::make($request->all(), [
                "money" => "required|lte:$availAmount|gte:100",
            ]);
        } else {
            $validation = Validator::make($request->all(), [
                "money" => "required|lte:2000|gte:100",
            ]);
        }
        if ($validation->fails()) {
            foreach ($validation->getMessageBag()->messages() as $key => $err) {

                foreach ($err as $ana) {
                    notify()->error($ana);
                }
            }
            return redirect()->back();
        }

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $request->money; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $inmate_deposit = null;
        if ($depo) {

            $inmate_deposit = InmateDeposit::where('inmate_id', auth('frontendAuth')->user()->inmate_id)->first();

                $inmate_deposit->update([
                    "inmate_id" => auth('frontendAuth')->user()->inmate_id,
                    'available_amount' => $depo->available_amount + $post_data['total_amount'],
                    'status' => 'Pending',
                    'transaction_id' => $post_data['tran_id'],
                ]);
        } else {

            $inmate_deposit = InmateDeposit::create([
                "inmate_id" => auth('frontendAuth')->user()->inmate_id,
                'available_amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'transaction_id' => $post_data['tran_id'],
            ]);
        }
        InmateDepositDetail::create([
            "inmate_deposit_id" => $inmate_deposit->id,
            "amount" => $post_data['total_amount'],
            "available_amount" => $inmate_deposit->available_amount,
        ]);
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to update as Pending.
        $inmate_deposit = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'available_amount')->first();
        if ($inmate_deposit->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount);
            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                 */
                $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)->first();
                $inmate_deposit->update(['status' => 'Processing']);
                    InmateDepositDetail::where('inmate_deposit_id', $inmate_deposit->id)->update(['status' => 'Processing']);
                echo "<br >Transaction is successfully Completed";
            }
        } else if ($inmate_deposit->status == 'Processing' || $inmate_deposit->status == 'Complete') {
            /*
            That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
        notify()->success('payment successful');
        return redirect()->route('payment.form');
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'available_amount')->first();

        if ($inmate_deposit->status == 'Pending') {
            $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)->first();
            $inmate_deposit->update(['status' => 'Failed']);
                InmateDepositDetail::where('inmate_deposit_id', $inmate_deposit->id)->update(['status' => 'Failed']);


            echo "Transaction is Falied";
        } else if ($inmate_deposit->status == 'Processing' || $inmate_deposit->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

       $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'available_amount')->first();


        if ($inmate_deposit->status == 'Pending') {
            $inmate_deposit = InmateDeposit::where('transaction_id', $tran_id)->first();
            $inmate_deposit->update(['status' => 'Canceled']);
                InmateDepositDetail::where('inmate_deposit_id', $inmate_deposit->id)->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($inmate_deposit->status == 'Processing' || $inmate_deposit->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

        $tran_id = $request->input('tran_id');

        #Check order status in order tabel against the transaction id or order id.
        $inmate_deposit = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($inmate_deposit->status == 'Pending') {
            $sslc = new SslCommerzNotification();
            $validation = $sslc->orderValidate($request->all(), $tran_id, $inmate_deposit->amount, $inmate_deposit->currency);
            if ($validation == true) {
                /*
                That means IPN worked. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successful transaction to customer
                 */
                $inmate_deposit = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo "Transaction is successfully Completed";
            }
        } else if ($inmate_deposit->status == 'Processing' || $inmate_deposit->status == 'Complete') {

            #That means Order status already updated. No need to udate database.

            echo "Transaction is already successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.

            echo "Invalid Transaction";
        }
    } else {
        echo "Invalid Data";
    }
}

}