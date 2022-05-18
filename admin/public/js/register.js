$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});

$(".slides").vegas({
    slides: [
        
        { src: "https://media.laodong.vn/storage/newsportal/Uploaded/ctvkhampha/2016_09_25/an9_TDCP.jpg?w=888&h=592&crop=auto&scale=both" },
        { src: "http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-60_044135017.jpg" },
    ]
});

 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#login").validate({
            rules: {
                email: "required",
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: "Vui lòng nhập email",
                
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải lớn hơn hoặc bằng 6 kí tự"
                }
            }
        });