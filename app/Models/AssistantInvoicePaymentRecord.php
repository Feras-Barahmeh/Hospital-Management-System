<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistantInvoicePaymentRecord extends Model
{
        use HasFactory;

        protected $fillable = [
                'date',
                'payment_type',
                'patient_id',
                'assistant_invoice_id',
                'amount',
        ];

        public static function getRecipient( $invoice): float
        {
                return (float) self::where('assistant_invoice_id', '=', $invoice->id)->sum('amount');
        }

}
