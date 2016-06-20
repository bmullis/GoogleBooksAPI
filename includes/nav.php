<nav class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <a href="index.php"><h2>READING-LIST</h2></a>
        </div>
        <div class="col-md-6 rightAlign">
            <form action="googlebooks.php" method="post">
                <p>Search for Books by </p>
                <select name="searchType" id="searchType">
                    <option value="inauthor">Author</option>
                    <option value="intitle">Title</option>
                    <option value="isbn">ISBN</option>
                </select>
                <input type="text" name="searchInput" id="searchInput">
                <input type="submit" name="submit" id="submit" value="Search">
            </form>
        </div>
    </div>
</nav>
