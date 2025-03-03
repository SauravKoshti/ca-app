<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Reviews</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Google Reviews</h2>
    <div id="reviews"></div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "/google-reviews",
                type: "GET",
                success: function (data) {
                    let reviewsHtml = "";
                    data.forEach(review => {
                        reviewsHtml += `
                            <div class="review">
                                <h4>${review.author_name}</h4>
                                <p>Rating: ${review.rating} ⭐</p>
                                <p>${review.text}</p>
                                <hr>
                            </div>`;
                    });
                    $("#reviews").html(reviewsHtml);
                },
                error: function () {
                    $("#reviews").html("<p>No reviews found</p>");
                }
            });
        });
    </script>

</body>
</html>
