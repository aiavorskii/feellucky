require('@popperjs/core')
import notification from 'notification-js'
import axios from 'axios';
import { Modal } from 'bootstrap';
import jQuery from 'jquery';

(($) => {

    $(document).on('click', '#clipboard-copy-button', function(e) {
        $("#copy-field").removeAttr('disabled');
        navigator.clipboard.writeText($("#copy-field").val())
        $("#copy-field").attr('disabled', true);
        notification.notify( 'success', 'Copied' );
    });

    $('#game-button').on('click', (e) => {
        let userid = $('#userid').val();
        axios.post(`/user/${userid}/feellucky`).then((response) => {
            $('#result-number-container').html(response.data.number);
            $('#result-container').html(response.data.result);
            $('#result-prize-container').html(response.data.prize);
        }).catch((error) => {
            notification.notify( 'error', 'Error occured' );
        });
    });

    $('#history-button').on('click', (e) => {
        let userid = $('#userid').val();
        axios.post(`/user/${userid}/get-history`).then((response) => {
            $('#history-table-wrapper').html(response.data)
        }).catch((error) => {
            notification.notify( 'error', 'Error occured' );
        });
    });

    $('#deactivate-current-link').on('click', (e) => {
        let userid = $('#userid').val();
        let tokenid = $('#tokenid').val();
        axios.post(`/user/${userid}/feellucky`).then((response) => {
            notification.notify( 'success', 'Link deactivated' );
        }).catch((error) => {
            notification.notify( 'error', 'Error occured' );
        });
    });


    $('#generate-button').on('click', (e) => {
        let userid = $('#userid').val();
        axios.post(`/user/${userid}/link-generate`).then((response) => {
            // open modal
            $('#copy-field').val(response.data.link)

            let linkModal = new Modal(document.getElementById('link-modal'))
            linkModal.show()
        }).catch((error) => {
            notification.notify( 'error', 'Error occured' );
        });
    })

    $('#register-form').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(document.querySelector('#register-form'))

        axios.post('/user', Object.fromEntries(formData)).then((response) => {
            // open modal
            $('#copy-field').val(response.data.link)

            let linkModal = new Modal(document.getElementById('link-modal'))
            linkModal.show()
        }).catch((error) => {
            if (error.response.data.errors !== undefined) {
                for (const [field, message] of Object.entries(error.response.data.errors)) {
                    notification.notify( 'error', message );
                }
            } else {
                notification.notify( 'error', 'Error occured' );
            }
        });
    })
})(jQuery)
