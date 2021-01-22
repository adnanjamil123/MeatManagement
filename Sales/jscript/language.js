
           $(document).ready(function(){

            let zones = document.querySelectorAll('[lang]');
            applyStrings(zones);

            let lang = findLocaleMatch();
            const html = document.querySelector('html')
            let container =  html.setAttribute("lang",lang);
            html.className = 'lang-match';


            function changelanguage()
            {
            let zones = document.querySelectorAll('[lang]');
            applyStrings(zones);

            let lang = findLocaleMatch();
            const html = document.querySelector('html')
            let container =  html.setAttribute("lang",lang);
            html.className = 'lang-match';
            }
            
           })
           
           
        //    document.addEventListener('DOMContentLoaded', () => {
        //     //skip the lang value in the HTML tag for this example
            
           

        //         let zones = document.querySelectorAll('[lang]');
        //         applyStrings(zones);
    
        //         let lang = findLocaleMatch();
        //         const html = document.querySelector('html')
        //         let container =  html.setAttribute("lang",lang);
        //         html.className = 'lang-match';
            
        // });

        function applyStrings(containers) {
            containers.forEach(container => {
                //find all the elements that have data-key
                let locale = container.getAttribute('lang');
                //console.log('looking inside of ', locale);
                container.querySelectorAll(`[data-key]`).forEach(element => {
                    
                    let key = element.getAttribute('data-key');
                    //console.log(element);
                    //console.log(key);
                    let lang = locale.substr(0, 2); //first 2 characters
                    if (key) {
$
                      //  $(element).text(langdata.languages[lang].strings[key]);
                        element.textContent = langdata.languages[lang].strings[key];
                        //console.log(element+"  "+langdata.languages[lang].strings[key]);
                    }
                });
            })
        }

        function findLocaleMatch() {
            let keys = Object.keys(langdata.languages); //from our data
            let locales = Intl.getCanonicalLocales(keys); //from our data validated
            let lang = navigator.language; //from browser 
            let locale = Intl.getCanonicalLocales(lang); //from browser validated
           // console.log('browser language', lang);
           // console.log('locales from data file', locale);

            //find the match for locale inside locales
            let langMatch = document.documentElement.getAttribute('lang'); //default
            locales = locales.filter(l => locale == l);
            langMatch = (locales.length > 0) ? locales[0] : langMatch;
            return langMatch;
        }
    

let langdata = {
    "languages":{
        "en":{ 
            "strings":{
                "btn-new":"NEW",
                "btn-clear":"CLEAR",
                "btn-save":"SAVE",
                "btn-print":"PRINT",
                "btn-sp":"SAVE & PRINT",
                "lng-vat":"VAT",
                "lng-price":"PRICE",
                "lng-total":"TOTAL",
                "lng-qty":"QTY",
                "lng-uom":"UOM",
                "lng-size":"SIZE",
                "lng-wvat":"TOTAL(without VAT)",
                "lng-desc":"DESCRIPTION",
                "lng-code":"CODE",
                "lng-log":"Sign Out",
                "lng-logo":"MEAT SHOP",
                "lng-quarter":"QUARTER",
                "lng-special":"Special",
                "lng-more":"More",
                "lng-cash":"CASH",
                "lng-atm":"ATM",
                "lng-branch":"Branch",
                "lng-user":"User",
                "lng-orderdetails":"ORDER DETAILS",
                "lng-invoicedetails":"INVOICE DETAILS",
                "lng-add":"ADD ITEM",
                "lng-bal":"Balance",
                "lng-invoice":"Invoice#",
                "lng-cr":"Cash Received",
                "lng-enter":"Save changes",
                "lng-cancel":"Close",
            }
        },
        "ar":{ 
            "strings":{
                "btn-new":"الجديد",
                "btn-clear":"حذف",
                "btn-save":"حفظ",
                "btn-print":"طباعه",
                "btn-sp":"حفظ وطباعة",
                "lng-vat":"ضريبة",
                "lng-price":"السعر",
                "lng-total":"مجموع",
                "lng-qty":"الكمية",
                "lng-uom":"قياس",
                "lng-size":"بحجم",
                "lng-wvat":"المجموع بدون ضريبة",
                "lng-desc":"الصنف",
                "lng-code":"كود",
                "lng-log":"تسجيل خروج",
                "lng-logo":"متجر اللحوم",
                "lng-quarter":"ربع",
                "lng-special":"خاص",
                "lng-more":"إضافي",
                "lng-cash":"نقد",
                "lng-atm":"بطاقة",
                "lng-branch":"فرع",
                "lng-user":"المستخدم",
                "lng-orderdetails":"تفاصيل الطلب",
                "lng-invoicedetails":"فاصيل الفاتورة",
                "lng-add":"اضافة عنصر",
                "lng-bal":"رصيد حساب",
                "lng-invoice":"#الفاتورة",
                "lng-cr":"المبلغ المستلم",
                "lng-enter":"أدخل",
                "lng-cancel":"إلغاء",

            }
        }

    }
}