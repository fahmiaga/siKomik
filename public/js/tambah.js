    $(document).ready(function () {
        if (window.File && window.FileList && window.FileReader) {
            $("#multiple_files").on("change", function (e) {
                var multiple_files = e.target.files,
                    filesLength = multiple_files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = multiple_files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function (e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"img-delete\">Hapus</span>" +
                            "</span>").insertAfter("#multiple_files");
                        $(".img-delete").click(function () {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("|Sorry, | Your browser doesn't support to File API")
        }
    });