<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .order-details {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .items-table th,
        .items-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .items-table th {
            background-color: #f8f9fa;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Payment Confirmation</h1>
        <p>Thank you for your purchase, {{ $user->name }}!</p>
    </div>

    <div class="content">
        <p>We're excited to confirm that your payment has been successfully processed.</p>

        <div class="order-details">
            <h3>Order Details</h3>
            <p><strong>Order Number:</strong> #{{ $order->order_number }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y g:i A') }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            @if(count($items) > 0)
            <h4>Items Ordered:</h4>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->book->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->unit_price, 2) }}</td>
                        <td>${{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <div class="total">
                <p>Total Amount: ${{ number_format($order->total_amount, 2) }}</p>
            </div>
        </div>

        <p>Your order is now being processed and you'll receive another email when it ships.</p>
        
        <p>If you have any questions about your order, please don't hesitate to contact our support team.</p>
    </div>

    <div class="footer">
        <p>Thank you for shopping with us!</p>
        <p>{{ config('app.name') }} | {{ config('app.url') }}</p>
        <p>This is an automated message, please do not reply to this email.</p>
    </div>
</body>
</html>