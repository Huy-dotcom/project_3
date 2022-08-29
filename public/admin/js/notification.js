function markAllAsRead()
{
    $.ajax({
        url: '/ad/notification/mark-all-as-read',
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                $('.notification-count').html(0);
                $('.new').hide();
                $('.mark-as-read').hide();
                for (var x of response.notifications) {
                    $(`#date-read-${x.id}`).html(x.date_read);
                }
            }
        }
    });
}

function markAsRead(id)
{
    $.ajax({
        url: '/ad/notification/mark-as-read',
        type: 'GET',
        data: {
            'id': id
        },
        success: function(response) {
            if(response.status == 200) {
                $(`#new-${id}`).hide();
                $(`#mark-as-read-${id}`).hide();
                $(`#new-item-${id}`).hide();
                $(`#notification-mark-as-read-${id}`).hide();
                $(`#date-read-${id}`).html(response.date_read);
                $('.notification-count').html(response.count);
            }
        }
    });
}