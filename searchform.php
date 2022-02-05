<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="search-box" method="post">

    <div class="form-search">

        <input type="text" name="s" id="search" placeholder="Išči" value="<?php the_search_query(); ?>" required/>
        <button type="submit">
            <i class="material-icons">search</i>
        </button>
        
    </div>
</form>