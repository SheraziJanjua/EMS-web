<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
        }

        /* Services Section */
        .services {
            padding: 40px 20px;
            text-align: center;
        }

        .services h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .services p {
            margin-bottom: 30px;
        }

        .service-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 16px;
        }

        /* Responsive Styles */

        @media only screen and (max-width: 767px) {
            .services {
                padding: 20px;
            }

            .service-card {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Employee Management System</h1>
        <p>Efficiently manage your workforce with our comprehensive solution</p>
    </header>

    <section class="services">
        <h2>Our Services</h2>
        <div class="service-card">
            <h3>Employee Database</h3>
            <p>Centralize employee information and track their details, such as personal information, job history, and performance.</p>
        </div>
        <div class="service-card">
            <h3>Manage your Employees</h3>
            <p>Automate time tracking, attendance management, and leave management for accurate and efficient employee scheduling.</p>
        </div>
        <div class="service-card">
            <h3>Payroll Management</h3>
            <p>Streamline payroll processing, including salary calculation, tax deductions, and generating pay slips.</p>
        </div>
        <div class="service-card">
            <h3>Performance Evaluation</h3>
            <p>Effortlessly conduct performance appraisals, set goals, and provide feedback to enhance employee performance.</p>
        </div>
    </section>
</body>

</html>
