$(document).ready (
    function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/api/currentStateMap.php",
            success: function (response) {
                resizeCanvas(response);
                drawMap(response);
            }
        });

        function resizeCanvas(response) {
            let width = response.map.longitude * CellHeight * CellWidth;
            let height = response.map.latitude * CellHeight * CellWidth;
            $( "#myCanvas" ).attr({
                width: width,
                height: height
            });
        }

        function nextMove() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/api/nextMove.php",
                success: function (response) {
                    drawMap(response);
                    showMessage(response);
                },
            });
        }

        $('#nextMove').on('click', function (e) {
            e.preventDefault();
            nextMove();
        });

        $('#restart').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/api/reset.php",
                success: function (response) {
                    drawMap(response);
                }
            });
        });

        let interval = 0;
        $('#start').on('click', function (e) {
            interval = setInterval(nextMove, 1000);
        });

        $('#stop').on('click', function (e) {
            clearInterval(interval);
        });
    }
)
