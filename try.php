<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Example Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>
<body>
    <select id="product-search" style="width:100%;"></select>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#product-search').select2({
                theme: "classic",
                placeholder: "Search product",
                ajax: {
                    url: 'http://localhost/Sadna/shop/retrieve_product.php',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            })
                        };
                    },
                    allowClear: true
                },
            })
        });
    </script>
</body>
</html>
