<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dff0d8; /* Light green background color */
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #4CAF50;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #333 3px solid;
            text-align: center;
        }

        .info {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <header>
        <h1>Exam Schedule</h1>
    </header>

    <div class="container">
        <!-- Exam Schedule Section -->
        <div class="info">
            <h2>Upcoming Exams</h2>
            <table>
                <thead>
                    <tr>
                        <th>Exam Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Download Timetable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Example data, replace this with your data fetching logic
                    $exams = [
                        ['title' => 'Math Exam', 'description' => 'Algebra and Geometry', 'date' => '2024-09-15', 'file' => 'math_exam_timetable.pdf'],
                        ['title' => 'English Literature', 'description' => 'Shakespeare and Modern Poetry', 'date' => '2024-09-20', 'file' => 'english_literature_timetable.pdf'],
                        // Add more exam records as needed
                    ];

                    foreach ($exams as $exam) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($exam['title']) . '</td>';
                        echo '<td>' . htmlspecialchars($exam['description']) . '</td>';
                        echo '<td>' . htmlspecialchars($exam['date']) . '</td>';
                        echo '<td><a href="path/to/timetables/' . htmlspecialchars($exam['file']) . '" class="btn" download>Download</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
