<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
        <div class="ui inverted section divider"></div>
        <img src="assets/images/logo.png" class="ui centered mini image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Site Map</a>
            <a class="item" href="#">Contact Us</a>
            <a class="item" href="#">Terms and Conditions</a>
            <a class="item" href="#">Privacy Policy</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tableRows = $('#myTable tbody tr');
        var totalRows = tableRows.length;
        var pageRows = 10;
        var totalPages = Math.ceil(totalRows / pageRows);
        var currentPage = 1;

        function showPage(page) {
            var start = (page - 1) * pageRows;
            var end = start + pageRows;

            tableRows.hide();
            tableRows.slice(start, end).show();

            $('#pagination .item').removeClass('active');
            $('#pagination #page' + page).addClass('active');

            if (currentPage == 1) {
                $('#prev').addClass('disabled');
            } else {
                $('#prev').removeClass('disabled');
            }

            if (currentPage == totalPages) {
                $('#next').addClass('disabled');
            } else {
                $('#next').removeClass('disabled');
            }
        }

        showPage(currentPage);

        $('#pagination #prev').click(function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        $('#pagination #next').click(function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        $('#pagination .item').not('#prev, #next').click(function() {
            var page = $(this).attr('id').
            page = page.replace('page', '');
            currentPage = parseInt(page);
            showPage(currentPage);
        });
    });
</script>
</body>

</html>