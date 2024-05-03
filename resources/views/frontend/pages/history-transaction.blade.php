<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Transaction History</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    {{-- <th>Paket Perjalanan</th> --}}
                    <th>total</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($transaction as $transactionn): ?>
                <tr>
                    <td><?= htmlspecialchars($counter) ?></td>
                    <td><?= htmlspecialchars($transactionn['name']) ?></td>
                    {{-- <td>Rp. <?= htmlspecialchars(number_format($transactionn['travel_package_price'], 2)) ?></td> --}}
                    <td>Rp. <?= htmlspecialchars($transactionn['total']) ?></td>
                    <td><button onclick="window.location.href='transaction-detail/<?= $transactionn['id'] ?>'"
                            class="btn btn-primary btn-sm">View</button></td>
                </tr>
                <?php $counter++; ?>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
