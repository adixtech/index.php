<?php
// Initialize message variables
$message = "";
$message_class = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($name && $email) {
        // SUCCESS: You can replace this block with database storage or email notification logic
        $message = "Thank you, " . htmlspecialchars($name) . "! Your spot has been successfully reserved.";
        $message_class = "success";
    } else {
        // ERROR handling
        $message = "Please enter a valid name and email address.";
        $message_class = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Modern Landing Page</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --text-main: #1f2937;
            --text-muted: #4b5563;
            --bg-light: #f9fafb;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.5;
            color: var(--text-main);
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 1.5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
        }

        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 3rem 1.5rem;
                gap: 2rem;
            }
        }

        .hero-text h1 {
            font-size: 3rem;
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        .hero-text p {
            font-size: 1.25rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .form-container {
            background: var(--bg-light);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: 2px solid var(--primary);
            border-color: transparent;
        }

        .btn-submit {
            width: 100%;
            background-color: var(--primary);
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .alert.success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .alert.error {
            background-color: #fee2e2;
            color: #991b1b;
        }

        footer {
            text-align: center;
            padding: 3rem 1rem;
            border-top: 1px solid #e5e7eb;
            color: var(--text-muted);
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">PHPLaunch🚀</div>
    </header>

    <main class="hero">
        <!-- Visual/Text Value Proposition Block -->
        <div class="hero-text">
            <h1>im a fool yeahhhh <br>That our motto "Drink Beer Save Water!".</h1>
            <p>Our boilerplate platform provides all the core mechanisms you need to launch a modern web application today. Sign up for early beta access.</p>
        </div>

        <!-- Dynamic PHP Lead Generation Form Block -->
        <div class="form-container">
            <!-- Inject status message alert box conditionally -->
            <?php if (!empty($message)): ?>
                <div class="alert <?php echo $message_class; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com">
                </div>
                <button type="submit" class="btn-submit">Claim Free Access</button>
            </form>
        </div>
    </main>

    <footer>
        <!-- Pulls the year dynamically using PHP date() -->
        <p>&copy; <?php echo date("Y"); ?> PHPLaunch. All rights reserved.</p>
    </footer>

</body>
</html>
