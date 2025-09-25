<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $pendingCount = Payment::where('status', 'pending')->count();
        $completeCount = Payment::where('status', 'complete')->count();

        return view('admin.payment.index', compact('payments', 'pendingCount', 'completeCount'));
    }

    public function update($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $payment->status === 'pending' ? 'complete' : 'pending';
        $payment->save();

        return redirect()->route('admin.payment.index')->with('success', 'Status pembayaran diperbarui.');
    }
}

