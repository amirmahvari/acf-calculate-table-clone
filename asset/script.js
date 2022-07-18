jQuery(document).ready(function () {
    jQuery(document).on('change', '.acf-subservice ul li input',function () {
        let el = jQuery(this)
        let parent = el.parents('.acf-subservice').data('conditions')
        // if (el.is(':checked')){
            jQuery('.acf-button.button.button-primary').trigger('click')
            let elRow = jQuery('.acf-repeater tr.acf-row')
            elRow.eq(elRow.length - 2).find('.acf-tr-text-subservice input').val(el.parents('label').text())
            elRow.eq(elRow.length - 2).find('.acf-tr-text-service input').val(parent[0][0].value)
            elRow.eq(elRow.length - 2).find('.acf-tr-service-price input').val(el.val())
            calculate(elRow.eq(elRow.length - 2))
        // }
    })
    jQuery(document).on('click', '.acf-tr-service select',function () {
        let el = jQuery(this);
        el.parents('tr').find('.acf-tr-service-price input').val(el.val())
        calculate(el)
    })
    jQuery(document).on('keyup', '.acf-tr-service-price input',function () {
        let el = jQuery(this);
        calculate(el)
    })
    jQuery(document).on('keyup', '.acf-tr-service-quantity input',function () {
        let el = jQuery(this);
        calculate(el)
    })
    jQuery(document).on('keyup', '.acf-tr-service-discount input',function () {
        let el = jQuery(this);
        calculate(el)
    })

    jQuery(document).on('keyup', '.acf-prepayment input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-discount-percent input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-discount-fixed input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-tax input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-tax-added input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-total input',function () {
        sum()
    })
    jQuery(document).on('keyup', '.acf-total-alpha input',function () {
        sum()
    })

    function calculate(el) {
        let price = el.parents('tr').find('.acf-tr-service-price input').val()
        let quantity = el.parents('tr').find('.acf-tr-service-quantity input').val()
        let discount = el.parents('tr').find('.acf-tr-service-discount input').val()
        price = discount ? discount : price;
        el.parents('tr').find('.acf-tr-service-total input').val(price * quantity)
        sum()
    }

    function sum() {
        let sum = 0
        jQuery('.acf-tr-service-total input').each(function () {
            sum += +jQuery(this).val();
        })
        let prepayment = jQuery('.acf-prepayment input');
        let percent = jQuery('.acf-discount-percent input');
        let fixed = jQuery('.acf-discount-fixed input');
        let tax = jQuery('.acf-tax input');
        let taxAdded = jQuery('.acf-tax-added input');
        let total = jQuery('.acf-total input');
        let totalAlpha = jQuery('.acf-total-alpha input');
        let final=sum;
        final += (tax.val() / 100) * sum
        final += (taxAdded.val() / 100) * sum
        final -= (percent.val() / 100) * final
        final -= fixed.val()
        final -= prepayment.val()
        total.val(final)
        totalAlpha.val(wordifyRialsInTomans(final * 10))
    }
})
