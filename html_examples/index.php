<!--
<?php

$name = "Michael"

?>
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Elements</title>
</head>

<body>
    <h1>Hello World!</h1>
    <!--<p><?php echo $name ?></p> -->
    <p id="someID" class="someClass">This is a paragraph with an ID and a class defined.</p>
    <header>
        <div>
            <h2>H2</h2>
            <pre>
                    This is a test of a pre-defined text element .    . .



                    You can have m u l t i p l e spaces between lines and characters.
            </pre>
        </div>
    </header>
    <main>
        <ul>
            <li>list item 1</li>
            <li>list item 2</li>
            <li>list item 3</li>
            <li>list item 4</li>
            <li>list item 5</li>
        </ul>
        <!-- nested list -->
        <ul>
            <li>list item 1</li>
            <li>list item 2</li>
            <li>list item 3

                <ul>
                    <li>sublist item 1</li>
                    <li>sublist item 2</li>
                </ul>
            </li>
            <li>list item 4</li>
        </ul>
        <!-- end of nested list -->
        <ol>
            <li>list item 1</li>
        </ol>
        <nav>
            <ul>
                <li><a href="http://www.sample.com/products.html">Products</a></li>
                <li><a href="http://www.sample.com/services.html">Services</a></li>
                <li><a href="http://www.sample.com/clients.html">Clients</a></li>
                <li><a href="http://www.sample.com/jobs.html">Jobs</a></li>
            </ul>
        </nav>
        <table border="1">
            <tr>
                <td>cell 1</td>
                <td>cell 2</td>
            </tr>
            <tr>
                <td>cell 1</td>
                <td>cell 2</td>
            </tr>
        </table>
    </main>
</body>

</html>