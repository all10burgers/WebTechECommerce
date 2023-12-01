<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS, if needed -->
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Contact Us</h2>
        
        <div class="row">
            <div class="col-md-6">
                <p>Getting In Touch Is Easy!</p>
                <p>Need to reach us? Click the email below or fill out the form on the right. Also, upload your resume if you want to work with us.</p>
                <a href="https://map.concept3d.com/?id=2028" class="btn btn-info mb-3">Find Us Here!</a>
                <p><a href="mailto:keenan.ray@my.utsa.edu" class="btn btn-secondary">keenan.ray@my.utsa.edu</a></p>
            </div>
            <div class="col-md-6">
                <form action="contact.php" method="POST" enctype="multipart/form-data" class="border p-3 rounded">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Message:</label>
                        <textarea class="form-control" name="textarea" id="textarea" rows="3" placeholder="Express Your Thoughts Here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resume">Upload Your Resume:</label>
                        <input type="file" class="form-control-file" name="resume" id="resume" accept=".pdf,.doc,.docx">
                    </div>
                    <button type="submit" class="btn btn-primary" name="send">Send Email</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
