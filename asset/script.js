jQuery(document).ready(function () {
    jQuery('.acf-tr-service select').on('click', function () {
        let el = jQuery(this);
        el.parents('tr').find('.acf-tr-service-price input').val(el.val())
        calculate(el)
    })
    jQuery('.acf-tr-service-price input').on('change', function () {
        let el = jQuery(this);
        calculate(el)
    })
    jQuery('.acf-tr-service-quantity input').on('change', function () {
        let el = jQuery(this);
        calculate(el)
    })
    function calculate(el) {
        let price = el.parents('tr').find('.acf-tr-service-price input').val()
        let quantity = el.parents('tr').find('.acf-tr-service-quantity input').val()
        el.parents('tr').find('.acf-tr-service-total input').val(price * quantity)
    }
})
