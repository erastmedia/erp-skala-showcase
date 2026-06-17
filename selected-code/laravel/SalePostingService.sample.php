<?php

// Sanitized Laravel sample for public showcase purposes.
// This is not the complete production implementation.

namespace App\Services\Sales;

use Illuminate\Support\Facades\DB;
use RuntimeException;

class SalePostingService
{
    public function post(int $businessId, int $saleId): array
    {
        return DB::transaction(function () use ($businessId, $saleId) {
            $sale = $this->findDraftSale($businessId, $saleId);

            $this->ensureSaleCanBePosted($sale);

            foreach ($sale['items'] as $item) {
                $this->ensureStockAvailable(
                    businessId: $businessId,
                    productId: $item['product_id'],
                    quantity: $item['quantity'],
                );

                $this->recordStockOut(
                    businessId: $businessId,
                    productId: $item['product_id'],
                    quantity: $item['quantity'],
                    reference: 'SALE-' . $saleId,
                );
            }

            $this->recordAccountingEntries($businessId, $sale);

            $this->markSaleAsPosted($businessId, $saleId);

            return [
                'id' => $saleId,
                'status' => 'posted',
                'message' => 'Sale posted successfully.',
            ];
        });
    }

    private function findDraftSale(int $businessId, int $saleId): array
    {
        // Example only. Production code uses Eloquent models,
        // tenant scopes, policies, resources, and detailed validation.
        return [
            'id' => $saleId,
            'business_id' => $businessId,
            'status' => 'draft',
            'total' => 125000,
            'items' => [
                [
                    'product_id' => 1,
                    'quantity' => 2,
                    'price' => 25000,
                ],
                [
                    'product_id' => 2,
                    'quantity' => 3,
                    'price' => 25000,
                ],
            ],
        ];
    }

    private function ensureSaleCanBePosted(array $sale): void
    {
        if ($sale['status'] !== 'draft') {
            throw new RuntimeException('Only draft sales can be posted.');
        }

        if (empty($sale['items'])) {
            throw new RuntimeException('Sale must contain at least one item.');
        }
    }

    private function ensureStockAvailable(
        int $businessId,
        int $productId,
        int $quantity
    ): void {
        // Placeholder for stock validation.
    }

    private function recordStockOut(
        int $businessId,
        int $productId,
        int $quantity,
        string $reference
    ): void {
        // Placeholder for inventory movement.
    }

    private function recordAccountingEntries(int $businessId, array $sale): void
    {
        // Placeholder for journal entries.
    }

    private function markSaleAsPosted(int $businessId, int $saleId): void
    {
        // Placeholder for sale status update.
    }
}
