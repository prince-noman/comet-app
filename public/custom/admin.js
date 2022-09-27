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
        let btn_no = 1;
        $("#add-new-slider-button").click(function (e) {
            e.preventDefault();
            $(".slider-btn-opt").append(`
                        <div class="btn-opt-area">
                            <span>Button #${btn_no}</span>
                            <span class="badge badge-danger remove-btn" style="margin-left:400px; cursor:pointer">remove</span>
                            <input class="form-control" name="btn_title[]" type="text" placeholder="Button Title">
                            <input class="form-control" name="btn_link[]" type="text" placeholder="Button Link">
                           
                            <select class="form-control" name="btn_type[]">
                                <option value="btn-light-out"> Default</option>
                                <option value="btn-color btn-full"> Red</option>
                            </select>
                            <hr>
                        </div>
            `);
            btn_no++;
        });

        //remove button
        $(document).on("click", ".remove-btn", function () {
            $(this).closest(".btn-opt-area").remove();
        });
    });
})(jQuery);
