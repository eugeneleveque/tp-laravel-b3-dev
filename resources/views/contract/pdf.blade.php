<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat - {{ $contract->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h3 {
            text-align: center;
        }
        .contract-content {
            margin-top: 20px;
        }
        .contract-content p {
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Contrat de Location - {{ $contract->box->name }}</h1>
    
    <div class="contract-content">
        {!! $contractText !!}
    </div>
</body>
</html>
