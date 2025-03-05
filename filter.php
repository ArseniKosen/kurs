<!-- filter.php -->
<section class="filter-section">
   <h2>Filter Products</h2>
   <form action="" method="POST" class="filter-form">
      <div class="filter-group">
         <label for="min_price">Minimum Price:</label>
         <input type="number" name="min_price" id="min_price" placeholder="0" min="0" value="<?= isset($_POST['min_price']) ? htmlspecialchars($_POST['min_price']) : ''; ?>">
      </div>
      <div class="filter-group">
         <label for="max_price">Maximum Price:</label>
         <input type="number" name="max_price" id="max_price" placeholder="1000" min="0" value="<?= isset($_POST['max_price']) ? htmlspecialchars($_POST['max_price']) : ''; ?>">
      </div>
      <div class="filter-group">
         <label for="sort">Sort By:</label>
         <select name="sort" id="sort">
            <option value="asc" <?= (isset($_POST['sort']) && $_POST['sort'] === 'asc') ? 'selected' : ''; ?>>Price: Low to High</option>
            <option value="desc" <?= (isset($_POST['sort']) && $_POST['sort'] === 'desc') ? 'selected' : ''; ?>>Price: High to Low</option>
         </select>
      </div>
      <input type="submit" value="Apply Filter" class="btn">
   </form>
</section>