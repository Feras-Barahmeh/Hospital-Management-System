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
                'price',
                'discount_value',
                'tax_rate',
                'tax_value',
                'total_with_tax',
                'type',
        ];

        public function doctors(): BelongsTo
        {
                return $this->belongsTo(Doctor::class, 'doctor_id');
        }

        public function departments(): BelongsTo
        {
                return $this->belongsTo(Department::class, 'department_id');
        }
        public function patients(): BelongsTo
        {
                return $this->belongsTo(Patient::class, 'patient_id');
        }
        public function assistants(): BelongsTo
        {
                return $this->belongsTo(Assistant::class, 'assistant_id');
        }


}
