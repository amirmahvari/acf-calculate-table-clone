jQuery(document).ready(function () {
    jQuery(document).on('change', '.acf-subservice ul li input ,.acf-subservice .acf-button-group label input',function () {
        let el = jQuery(this)
        let parent = el.parents('.acf-subservice').data('conditions')
        if (el.is(':checked')){
            jQuery('.acf-button.button.button-primary').trigger('click')
            let elRow = jQuery('.acf-repeater tr.acf-row')
            console.log(el.parents('label').text())
            elRow.eq(elRow.length - 2).find('.acf-tr-text-subservice input').val(el.parents('label').text())
            elRow.eq(elRow.length - 2).find('.acf-tr-text-service input').val(parent[0][0].value)
            elRow.eq(elRow.length - 2).find('.acf-tr-service-price input').val(el.val())
            calculate(elRow.eq(elRow.length - 2))
        }
    })
    jQuery(document).on('click', '.acf-tr-service select',function () {
        let el = jQuery(this);
        el.parents('tr').find('.acf-tr-service-price input').val(el.val())
        calculate(el.parents('tr'))
    })
    jQuery(document).on('keyup', '.acf-tr-service-price input',function () {
        let el = jQuery(this);
        calculate(el.parents('tr'))
    })
    jQuery(document).on('keyup', '.acf-tr-service-quantity input',function () {
        let el = jQuery(this);
        calculate(el.parents('tr'))
    })
    jQuery(document).on('keyup', '.acf-tr-service-discount input',function () {
        let el = jQuery(this);
        calculate(el.parents('tr'))
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
    jQuery(document).on('keyup',   '.acf-changer input',function () {
        let el = jQuery(this)
        if (!el.value){
            jQuery('.acf-items-changer input').prop('checked',false)
        }
    })
    function calculate(el) {
        let price = el.find('.acf-tr-service-price input').val()
        price = price.replace(/,/g, "")
        let quantity = el.find('.acf-tr-service-quantity input').val()
        quantity = quantity.replace(/,/g, "")
        let discount = el.find('.acf-tr-service-discount input').val()
        discount = discount.replace(/,/g, "")
        price = discount ? discount : price;
        el.find('.acf-tr-service-total input').val(price * quantity)
        sum()
    }

    function sum() {
        let sum = 0
        jQuery('.acf-tr-service-total input').each(function () {
            sum += +jQuery(this).val().replace(/,/g, "");
        })
        let total = jQuery('.acf-total input');
        let totalAlpha = jQuery('.acf-total-alpha input');
        let final=sum;
        if (!jQuery('.acf-tax').hasClass('acf-hidden')) {
            let tax = jQuery('.acf-tax input');
            final += (tax.val().replace(/,/g, "") / 100) * sum
        }
        if (!jQuery('.acf-tax-added').hasClass('acf-hidden')) {
            let taxAdded = jQuery('.acf-tax-added input');
            final += (taxAdded.val().replace(/,/g, "") / 100) * sum
        }
        if (!jQuery('.acf-discount-percent').hasClass('acf-hidden')) {
            let percent = jQuery('.acf-discount-percent input');
            final -= (percent.val().replace(/,/g, "") / 100) * final
        }
        if (!jQuery('.acf-discount-fixed').hasClass('acf-hidden')) {
            let fixed = jQuery('.acf-discount-fixed input');
            final -= fixed.val().replace(/,/g, "")
        }
        if (!jQuery('.acf-prepayment').hasClass('acf-hidden')) {
            let prepayment = jQuery('.acf-prepayment input');
            final -= prepayment.val()
        }
        total.val(final)
        totalAlpha.val(wordifyRialsInTomans(final * 10))
    }
})
