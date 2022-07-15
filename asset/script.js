jQuery(document).ready(function () {
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
    jQuery(document).on('change', '.acf-status input',function () {
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
        let total = jQuery('.acf-total input');
        let totalAlpha = jQuery('.acf-total-alpha input');
        let final=sum;
        if (!jQuery('.acf-tax').hasClass('acf-hidden')) {
            let tax = jQuery('.acf-tax input');
            final += (tax.val() / 100) * sum
        }
        if (!jQuery('.acf-tax-added').hasClass('acf-hidden')) {
            let taxAdded = jQuery('.acf-tax-added input');
            final += (taxAdded.val() / 100) * sum
        }
        if (!jQuery('.acf-discount-percent').hasClass('acf-hidden')) {
            let percent = jQuery('.acf-discount-percent input');
            final -= (percent.val() / 100) * final
        }
        if (!jQuery('.acf-discount-fixed').hasClass('acf-hidden')) {
            let fixed = jQuery('.acf-discount-fixed input');
            final -= fixed.val()
        }
        if (!jQuery('.acf-prepayment').hasClass('acf-hidden')) {
            let prepayment = jQuery('.acf-prepayment input');
            final -= prepayment.val()
        }
        total.val(final)
        totalAlpha.val(wordifyRialsInTomans(final * 10))
    }
})
