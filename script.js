$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: 'submit.php', // Оновіть до 'Testing/submit.php', якщо проект у підпапці
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json', // Вказуємо, що очікуємо JSON
            success: function(response) {
                // response уже є об’єктом, не потрібно JSON.parse
                let res = response;
                $('#response').removeClass('d-none alert-danger alert-success')
                    .addClass('alert ' + (res.status === 'success' ? 'alert-success' : 'alert-danger'))
                    .text(res.message);
                
                if (res.status === 'success') {
                    $('#contactForm')[0].reset();
                    $('#messagesTable').prepend(
                        `<tr><td>${res.data.name}</td><td>${res.data.email}</td><td>${res.data.message}</td><td>${res.data.created_at}</td></tr>`
                    );
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX error:', textStatus, errorThrown);
                $('#response').removeClass('d-none').addClass('alert alert-danger').text('Помилка сервера. Спробуйте ще раз.');
            }
        });
    });
});