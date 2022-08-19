(function ($) {
    $(document).ready(function () {
        //delete btn alert
        $(".delete-form").submit(function (e) {
            let conf = confirm("Are you sure?");

            if (conf) {
                return true;
            } else {
                e.preventDefault();
            }
        });

        //Data table JS
        $(".data-table-comet").DataTable();

        //Slider photo preview
        $("#slider-photo").change(function (e) {
            const photo_url = URL.createObjectURL(e.target.files[0]);
            $("#slider-photo-preview").attr("src", photo_url);
        });

        //add-new-slider-button
        $("#add-new-slider-button").click(function (e) {
            e.preventDefault();
            $(".slider-btn-opt").prepend(`
                        <div class="btn-opt-area">
                            <span>Button #1</span>
                            <input class="form-control" type="text" placeholder="Button Title">
                            <input class="form-control" type="text" placeholder="Button Link">
                        </div>
            `);
        });
    });
})(jQuery);
