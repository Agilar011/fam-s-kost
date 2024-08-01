<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\KindPaymentLogs;
use App\Models\Member;
use App\Models\PaymentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PaymentLogController extends Controller
{
    public const TRANSACTION_ROUTE = [
        "index" => "transactions.index",
        "store" => "transactions.store",
        "create" => "transactions.create",
        "show" => "transactions.show",
        "delete" => "transactions.destroy",
        // "store" => "transactions.store",
        // "createTransaction" => "success.create",

    ];

    public const TRANSACTION_VIEW = [
        "index" => "dashboard.transaction.index",
        "create" => "dashboard.transaction.create",
        "detail" => "dashboard.transaction.detail",
        "createTransaction" => "dashboard.afterSuccess.createTransaction",

    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == "admin" || auth()->user()->role == 'superadmin') {
            $transactions = PaymentLog::with('member')->paginate(10);
            $months = config("app.month.language.indonesian");

            foreach ($transactions as $transaction) {
                $date_from = $months[((int) date("m", strtotime($transaction->from))) - 1]["name"] . " " . date("Y", strtotime($transaction->from));
                $date_to = $months[((int) date("m", strtotime($transaction->to))) - 1]["name"] . " " . date("Y", strtotime($transaction->to));
                $date_payment = date("d", strtotime($transaction->created_at)) . " " . $months[((int) date("m", strtotime($transaction->created_at))) - 1]["name"] . " " . date("Y", strtotime($transaction->created_at));
                $transaction["from"] = $date_from;
                $transaction["to"] = $date_to;
                $transaction["date_payment"] = $date_payment;
            }

            return view(PaymentLogController::TRANSACTION_VIEW["index"], [
                'title' => 'Data Transaksi',
                'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
                'transactions' => $transactions,
            ]);
        } else {
            abort(403, 'You do not have permission to access this page');
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::with(["rooms"])->get();
        foreach ($members as $indexdormitory => $member) {
            if (count($member->rooms) == 0) {
                unset($members[$indexdormitory]);
            }
        }


        // <div class="alert alert-info" role="alert">
        //     A simple info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
        // </div>

        return view(PaymentLogController::TRANSACTION_VIEW["create"], [
            'title' => 'Tambah Transaksi',
            'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
            'members_route' => MemberController::MEMBER_ROUTE,
            'kindpaymentlogs_route' => KindPaymentLogsController::KINDPAYMENT_ROUTE,
            'members' => $members,
            'kindpaymentlogs' => KindPaymentLogs::all(),
            'transactions' => PaymentLog::all(),
            'month_length' => config("app.month.length"),
            'months' => config("app.month.language.indonesian"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $needImage = KindPaymentLogs::where("id", $request->fk_id_kind_paymentlogs)->first()->need_image;
        $rulesData = [
            'total_month' => 'required|integer|min:1',
            'month_from' => 'required',
            'year_from' => 'required',
            'month_to' => 'required',
            'year_to' => 'required',
            'fk_id_kind_paymentlogs' => 'required',
            'fk_id_member' => 'required'
        ];

        if ($needImage) {
            $rulesData["proof_payment"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);

        $dataMember = Member::where('id', $validatedData['fk_id_member'])->first();

        $day = date('d', strtotime($dataMember->checkin_date));

        $validatedData["from"] = $validatedData["year_from"] . "-" . $validatedData["month_from"] . "-" . $day;
        $validatedData["to"] = $validatedData["year_to"] . "-" . $validatedData["month_to"] . "-" . $day;
        unset($validatedData["month_from"], $validatedData["year_from"], $validatedData["month_to"], $validatedData["year_to"]);

        // return dd($validatedData);

        // $tahun = date('Y');
        // $bulan = date('m');
        // $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        // return $tanggal;

        if ($needImage) {
            $file = $request->file('proof_payment')->store('proof-payment', 'public');
            $validatedData["proof_payment"] = $file;
        }

        // dd($validatedData);
        PaymentLog::create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Payment Log created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentLog $transaction)
    {
        return view(PaymentLogController::TRANSACTION_VIEW["detail"], [
            'title' => 'Detail Transaksi',
            'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari payment log berdasarkan ID
            $paymentLog = PaymentLog::findOrFail($id);

            // Hapus payment log dari database
            $paymentLog->delete();

            // Berikan pesan sukses dan redirect ke halaman index
            return redirect()->route('transactions.index')->with('success', 'Payment Log deleted successfully');
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat menghapus payment log
            return redirect()->route('transactions.index')->with('error', 'Failed to delete payment log');
        }
    }

    public function createTransaction()
    {
        $members = Member::with(["rooms"])->get();
        foreach ($members as $indexdormitory => $member) {
            if (count($member->rooms) == 0) {
                unset($members[$indexdormitory]);
            }
        }

        // $dormitories = Dormitory::with(["rooms"])->get();
        // foreach ($dormitories as $indexdormitory => $dormitory) {
        //     if (count($dormitory->rooms) == 0) {
        //         unset($dormitories[$indexdormitory]);
        //     }
        // }

        // <div class="alert alert-info" role="alert">
        //     A simple info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
        // </div>

        return view(PaymentLogController::TRANSACTION_VIEW["createTransaction"], [
            'title' => 'Tambah Transaksi',
            'transactions_route' => PaymentLogController::TRANSACTION_ROUTE,
            'members_route' => MemberController::MEMBER_ROUTE,
            'kindpaymentlogs_route' => KindPaymentLogsController::KINDPAYMENT_ROUTE,
            'members' => $members,
            'kindpaymentlogs' => KindPaymentLogs::all(),
            'transactions' => PaymentLog::all(),
            'month_length' => config("app.month.length"),
            'months' => config("app.month.language.indonesian"),
        ]);
    }

    public function storeTransaction(Request $request)
    {
        $needImage = KindPaymentLogs::where("id", $request->fk_id_kind_paymentlogs)->first()->need_image;
        $rulesData = [
            'total_month' => 'required|integer|min:1',
            'month_from' => 'required',
            'year_from' => 'required',
            'month_to' => 'required',
            'year_to' => 'required',
            'fk_id_kind_paymentlogs' => 'required',
            'fk_id_member' => 'required'
        ];

        if ($needImage) {
            $rulesData["proof_payment"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);

        $dataMember = Member::where('id', $validatedData['fk_id_member'])->first();

        $day = date('d', strtotime($dataMember->checkin_date));

        $validatedData["from"] = $validatedData["year_from"] . "-" . $validatedData["month_from"] . "-" . $day;
        $validatedData["to"] = $validatedData["year_to"] . "-" . $validatedData["month_to"] . "-" . $day;
        unset($validatedData["month_from"], $validatedData["year_from"], $validatedData["month_to"], $validatedData["year_to"]);

        // return dd($validatedData);

        // $tahun = date('Y');
        // $bulan = date('m');
        // $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        // return $tanggal;

        if ($needImage) {
            $file = $request->file('proof_payment')->store('proof-payment', 'public');
            $validatedData["proof_payment"] = $file;
        }

        // dd($validatedData);
        PaymentLog::create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Payment Log created successfully');


    }
}
