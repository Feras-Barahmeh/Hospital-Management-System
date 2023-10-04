<?php

return [

        /*
        |--------------------------------------------------------------------------
        | Invoices Language English
        |--------------------------------------------------------------------------
        |
        |   Contain Invoices words english
        |
        */

        'title' => 'Invoice',
        'title_head_assistant_invoice' => 'Admin | Invoices',
        'invoice' => 'Invoice',
        'add_invoice' => 'Add Invoice',
        'edit_invoice' => 'Edit Invoice',
        'delete_invoice' => 'Delete Invoice',

        'name_patient' => 'Name patient',
        'select_name_patient' => 'Select name patient',
        'name_doctor' => 'Name doctor',
        'select_name_doctor' => 'Select name doctor',
        'department_doctor' => 'Doctor department',
        'invoice_type' => 'Invoice Type',
        'invoice_date' => 'Invoice date',
        'assistant_name' => 'Assistant name',
        'select_assistant_name' => 'Select Assistant name',
        'price_assistant' => 'Assistant price',
        'discount_amount' => 'Discount amount',
        'tax_rate' => 'Tax rate',
        'tax_amount' => 'Tax amount',
        'total_with_tax' => 'Out the door price',

        /**
         * columns
         */
        'patient' =>'Patient',
        'doctor' =>'Doctor',
        'assistant' =>'Assistant',
        'department' =>'Department',
        'total_with_out_discount' =>'Total',


        /**
         * Create
         */
        'title_create_assistant_invoice' => 'Admin | Invoices | Create',

        /**
         * Messages
         */
        'success_add' => 'Success added invoice with number :id ',
        'success_edit' => 'Success edit invoice with number :id',
        'success_delete' => 'Success delete invoice with number :id',
        'fail_add' => 'Fail added invoice with number :id',
        'fail_edit' => 'Fail edit invoice with number :id',
        'fail_delete' => 'Fail delete invoice with number :id',
        'delete_assistant_invoice' => 'Are you sure want delete invoice with has id <span class="text-danger">:id</span>',



        /**
         * Validation
         */
        'exist' => ':id Invoice already exist',
        'failed' => ':id Invoice do not match our records.',
];
