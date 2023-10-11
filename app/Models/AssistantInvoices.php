<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssistantInvoices extends Model
{
        use HasFactory;

        protected $fillable = [
                'invoice_date',
                'patient_id',
                'doctor_id',
                'assistant_id',
                'department_id',
                'patient_account_id',
                'price',
                'discount_value',
                'tax_rate',
                'tax_value',
                'total_with_tax',
                'payment_type',
        ];

        public function doctor(): BelongsTo
        {
                return $this->belongsTo(Doctor::class, 'doctor_id');
        }

        public function department(): BelongsTo
        {
                return $this->belongsTo(Department::class, 'department_id');
        }
        public function patient(): BelongsTo
        {
                return $this->belongsTo(Patient::class, 'patient_id');
        }
        public function assistant(): BelongsTo
        {
                return $this->belongsTo(Assistant::class, 'assistant_id');
        }
        public function patientAccount(): BelongsTo
        {
                return $this->belongsTo(PatientAccount::class, 'patient_account_id');
        }
}
