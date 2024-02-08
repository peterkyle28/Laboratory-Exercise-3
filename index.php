<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header-fix">
        <div class="header-container">
            <h1><i class="fa fa-table"></i> Forms</h1>
        </div>
    </header>


    <section>
        <div class="container">
            <aside class="aside">
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <strong>
                    <li>method: POST</li>
                    <li> Mandatory fields</li>
                    <li>Standard field: text and password</li>
                    <li> Checkbox: checkbox</li>
                    <li> Standard button:submit</li>
                    </strong>
                </ul>
            </aside>
            <article>
                <h1 class="Login form">Login form</h1>
                <p class="marginbot50">Standard form to enter these <strong>login credentials</strong> </p>
                <form action="" method="post">
                    <div class="fdiv">
                        <label for="fname">Username:</label>
                        <input type="text" id="fname" name="Username"><br>
                        <label for="pword">Password:</label>
                        <input type="password" id="pword" name="Password"><br>
                        <div class="cbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="vehicle3"> Remember me</label>
                        </div>
                        <div class="btun">
                            <input type="submit" name="form" value="Login">
                        </div>
                    </div>
                </form>
            </article>

            <?php if (!empty($_POST) && $_POST['form'] === "Login") { ?>
                <div class="result">
                    <b>Values returned by the form:</b><br>
                    <ul>
                        <?php foreach ($_POST as $key => $value) { ?>
                            <li><?php echo $key . ' => ' . $value; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <hr>

            <aside class="aside">
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <strong>
                    <li>method: POST</li>
                    <li> Mandatory fields</li>
                    <li>File sending</li>
                    <li> Standard field: text, email, date, file and password</li>
                    <li> Checkbox: checkbox</li>
                    <li> Radio button: submit</li>
                    <li> Standard button: submit</li>
                    </strong>
                </ul>
            </aside>
            <article>
                <h1 class="Login form">Registration Form</h1>
                <p class="marginbot50">Standard form for <strong>online registration</strong> on website: </p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="fdiv">
                        <label style="display: inline-block;margin: 4px;width: 200px;">Enter your <strong>gender</strong>:<span class="mandatory">*</span></label>
                        <input type="radio" id="female" name="gender" value="FEMALE">
                        <label for="female">FEMALE</label>
                        <input type="radio" id="male" name="gender" value="MALE">
                        <label for="male">MALE</label><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="lastname">Enter your <strong>Lastname</strong>:<span class="mandatory">*</span></label>
                        <input type="text" id="lastname" name="lname"><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="firstname">Enter your <strong>Firstname</strong>:</label>
                        <input type="text" id="firstname" name="fname"><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="start">Enter your <strong>Date of birth</strong>:</label>
                        <input type="date" id="start" name="birth date" /><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="image-upload">Enter your <strong>photo</strong>:</label>
                        <input type="file" name="imageFile" id="imageFile" accept="image/*" required><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="eymail">Enter your <strong>Email address</strong>:<span class="mandatory">*</span></label>
                        <input type="email" id="eymail"><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="pass">Enter your <strong>Password</strong>:<span class="mandatory">*</span></label>
                        <input type="password" id="pass" name="pass" required><br>
                        <label style="display: inline-block;margin: 4px;width: 200px;" for="conpass"><strong>Confirm</strong> your password:<span class="mandatory">*</span></label>
                        <input type="password" id="confirm pswd" name="conpass" required><br>
                        <span class="mandatory">*mandatory fields</span>
                        <div class="cbox1">
                            <input type="checkbox" id="remember" name="remember">
                            <label style="display: inline-block;margin: 4px;width: 200px;" for="vehicle3"> Accept TOS</label>
                        </div>
                        <div class="btun">
                            <input type="hidden" name="form" value="login">
                            <input type="submit" name="submit" value="Registration">
                        </div>
                    </div>
                </form>
            </article>
            <?php if (!empty($_POST) && $_POST['form'] === "login") { ?>
                <div class="result">
                    <b>Values returned by the form:</b><br>
                    <ul>
                        <?php foreach ($_POST as $key => $value) {
                            echo '<li>' . $key . ' => ' . $value . '</li>';
                        } ?>
                    </ul>
                    <?php
                if (!empty($_POST) && $_POST['form'] === "login" && isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {

                    $imageTmpName = $_FILES['imageFile']['tmp_name'];
                    $imageName = $_FILES['imageFile']['name'];
                    $imageType = $_FILES['imageFile']['type'];
                    $imageSize = $_FILES['imageFile']['size'];

                    // Check if file is an actual image
                    if (getimagesize($imageTmpName) !== false) {
                        // Create directory if not exists
                        $uploadDirectory = 'uploads/';
                        if (!file_exists($uploadDirectory)) {
                            mkdir($uploadDirectory, 0777, true);
                        }
                        // Move uploaded file to target destination
                        if (move_uploaded_file($imageTmpName, $uploadDirectory . $imageName)) {
                            // Display the uploaded image
                            echo '<div id="imageView">';
                            echo '<p>Uploaded Image:</p>';
                            echo '<img src="' . $uploadDirectory . $imageName . '" alt="' . $imageName . '" style="max-width: 250px;">';
                            echo '</div>';
                        } else {
                            echo 'Failed to move the uploaded file.';
                        }
                    } else {
                        echo 'File is not an image.';
                    }
                } elseif (!empty($_FILES['imageFile'])) {
                    echo 'Error uploading file. Error code: ' . $_FILES['imageFile']['error'];   
                }
              ?>
                </div>
                <?php } ?>

               
    
    
                <hr>

                <aside class="aside">
                    <h2><i class="fa fa-question"></i>Info</h2>
                    <ul>
                        <strong>
                        <li>method: POST</li>
                        <li> Mandatory fields</li>
                        <li>Placeholder attribute</li>
                        <li> Maxlenght and minlenght attributes</li>
                        <li> Textarea</li>
                        <li> Radio button: submit</li>
                        <li> Standard button: submit</li>
                        </strong>
                    </ul>
                </aside>
                <article>
                    <h1 class="Login form">Contact Form</h1>
                    <p class="marginbot50">Standard for making an <strong>information request</strong> on a website: </p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="fdiv">
                            <label style="display: inline-block;margin: 4px;width: 231px;" for="cdepart">Department you wish to contact:</label>
                            <select id="cdepart" name="department">
                                <option value="Sales Department">Sales Department</option>
                                <option value="Communication Department">Communication Department</option>
                                <option value="Technical Department">Technical Department</option>
                            </select><br>
                            <label style="display: inline-block;margin: 4px;width: 230px;" for="title">Enter a <strong>Title:</strong></label>
                            <input type="text" maxlength="20" id="title" name="title" placeholder="More than 20 characters"><br>
                            <label style="display: inline-block;margin: 4px;width: 227px;">Enter a <strong>Question</strong>:<span class="mandatory">*</span></label>
                            <input class="txt" type="text" maxlength="1000" name="question" placeholder="Maximum 1000 characters......................." required><br>
                            <label style="display: inline-block;margin: 4px;width: 230px;" for="eymail1">Enter your <strong>Email address</strong>:<span class="mandatory">*</span></label>
                            <input type="email" id="eymail1" name="email" placeholder="Your Email....." required><br>
                            <div class="btun">
                                <input type="submit" name="form" value="contact">
                            </div>
                        </div>
                    </form>
                </article>
                <?php
                if (!empty($_POST) && $_POST['form'] === "contact") {
                ?>
                    <div class="result">
                        <b>Values returned by the form:</b><br>
                        <ul>
                            <?php
                            foreach ($_POST as $key => $value) {
                                if ($key != 'form') {
                            ?>
                                    <li><?php echo htmlspecialchars($key) . ' => ' . htmlspecialchars($value); ?></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
                
        </div>
    </section>




</body>

</html>