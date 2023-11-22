<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

    </head>
    <body class="vertical rtl ">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div id="js-tree"></div>
                </div>
                <div class="col-md-6">
                    <div class="spinner-border m-5 d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <table class="table d-none">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الإسم</th>
                            <th scope="col">الكود</th>
                            <th scope="col">المدير</th>
                        </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>


        <script>
            const base = @json($base);
            const tbody = $('#tbody');
            const spinner = $('.spinner-border');
            const table = $('table.table');

            function loadDetails(node) {
                tbody.html('')
                spinner.removeClass('d-none')
                table.addClass('d-none')

                const nodeId = node.data.id

                let html = ''

                base.filter(item => item.id === nodeId || item.parent_id === nodeId).forEach(({name, manager, code, parent_id}, idx) => {
                    html += `
                            <tr class="${idx !== 0 ? 'child' : 'table-success'}">
                                <th scope="row">${idx+1}</th>
                                <td>${name}</td>
                                <td>${code}</td>
                                <td>${manager}</td>
                            </tr>
                    `
                })

                tbody.html(html)

                spinner.addClass('d-none')
                table.removeClass('d-none')
            }

            $(function () {
                const tree = $('#js-tree')

                tree.jstree({
                    'plugins':["wholerow","themes", "html_data", "ui"],
                    'core' : {
                        data : @json($tree)
                    }
                })

                tree.on('select_node.jstree', function (e, data) {
                    loadDetails(data.node)
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>    </body>
</html>
