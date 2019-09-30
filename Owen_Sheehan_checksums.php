<! DOCTYPE HTML>
<html lang = "en">
    <head>
        <meta charset="UTF-8" />
        <title>Owen_Sheehan_checksums</title>
    </head>
    <body>
        <section>
        	<h1>PPSN Checker</h1>
            <form action="ppsn2.php" method="post">
                PPSN:<input name = "ppsn" type = "text" required>
                <input type="submit" value="Send">
                <input type="reset" value="reset">
            </form>
        </section>
        <section>
          	<h1>PESEL Checker</h1>
            <form action="pesel.php" method="post">
                PESEL:<input name = "pesel" type = "text" required>
                <input type="submit" value="Send">
                <input type="reset" value="reset">
            </form>
        </section>
        <section>
        	<h1>ISBN Checker</h1>
            <form action="isbn.php" method="post">
                ISBN:<input name = "isbn" type = "text" required>
                <input type="submit" value="Send">
                <input type="reset" value="reset">
            </form>
        </section>
    </body>
</html>
