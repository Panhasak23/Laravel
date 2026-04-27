<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('payrolls', 'employee_id')) {
            Schema::table('payrolls', function (Blueprint $table) {
                $table->dropForeign(['employee_id']);
                $table->dropColumn('employee_id');
            });
        }

        Schema::table('payrolls', function (Blueprint $table) {
            if (Schema::hasColumn('payrolls', 'period')) {
                $table->dropColumn('period');
            }

            if (Schema::hasColumn('payrolls', 'amount')) {
                $table->dropColumn('amount');
            }

            if (Schema::hasColumn('payrolls', 'status')) {
                $table->dropColumn('status');
            }
        });

        Schema::table('payrolls', function (Blueprint $table) {
            if (! Schema::hasColumn('payrolls', 'employee_name')) {
                $table->string('employee_name')->after('id');
            }

            if (! Schema::hasColumn('payrolls', 'salary')) {
                $table->integer('salary');
            }

            if (! Schema::hasColumn('payrolls', 'bonus')) {
                $table->integer('bonus')->default(0);
            }

            if (! Schema::hasColumn('payrolls', 'deduction')) {
                $table->integer('deduction')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            if (Schema::hasColumn('payrolls', 'employee_name')) {
                $table->dropColumn('employee_name');
            }

            if (Schema::hasColumn('payrolls', 'salary')) {
                $table->dropColumn('salary');
            }

            if (Schema::hasColumn('payrolls', 'bonus')) {
                $table->dropColumn('bonus');
            }

            if (Schema::hasColumn('payrolls', 'deduction')) {
                $table->dropColumn('deduction');
            }
        });

        Schema::table('payrolls', function (Blueprint $table) {
            if (! Schema::hasColumn('payrolls', 'employee_id')) {
                $table->foreignId('employee_id')->nullable()->constrained()->nullOnDelete();
            }

            if (! Schema::hasColumn('payrolls', 'period')) {
                $table->string('period')->nullable();
            }

            if (! Schema::hasColumn('payrolls', 'amount')) {
                $table->decimal('amount', 8, 2)->default(0);
            }

            if (! Schema::hasColumn('payrolls', 'status')) {
                $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            }
        });
    }
};
