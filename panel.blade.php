<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Grid</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM9Wb23H2bYBZW03R3Z3O9O1x9cWJExD/sY5dK" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .grid {
            display: grid;
            grid-template-columns: 2fr repeat(5, 1fr); /* Left column wider */
            grid-template-rows: repeat(9, 50px); /* 9 rows, each 50px tall */
            gap: 10px; /* Gap between panels */
        }
        .panel {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="grid">
        @php
            $dynamicText1 = "Dynamic Text 1";

            $panelTexts = [
                $dynamicText1, "SNV", "DEL", "DUP", "INV", "INS",
                "3' UTR", "", "", "", "", "", 
                "Intron","", "", "", "", "", 
                "Exons","", "", "", "", "", 
                "5' UTR", "", "", "", "", "", 
                "promoter", "", "", "", "", "", 
                "insulator","", "", "", "", "",
                "poised enhancer", "", "", "", "", "", 
                "active enhancer", "", "", "", "", "", "",
                "", "", "", "", "", ""
        ];
        @endphp

        @for ($row = 0; $row < 9; $row++)
            @for ($col = 0; $col < 6; $col++)
                <div class="panel">{{ $panelTexts[$row * 6 + $col] }}</div>
            @endfor
        @endfor
    </div>
</body>
</html>
