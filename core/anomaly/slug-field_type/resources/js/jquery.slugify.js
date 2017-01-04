/*
 * jQuery Slugify plugin v1.0
 *
 * Copyright 2012, Ryun Shofner <ryun@humboldtweb.com>
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *	jquery
 */
(function (window, $) {

    var char_map = {

        //Latin
        'À': 'A',
        'Á': 'A',
        'Â': 'A',
        'Ã': 'A',
        'Ä': 'A',
        'Å': 'A',
        'Æ': 'AE',
        'Ç': 'C',
        'È': 'E',
        'É': 'E',
        'Ê': 'E',
        'Ë': 'E',
        'Ì': 'I',
        'Í': 'I',
        'Î': 'I',
        'Ï': 'I',
        'Ð': 'D',
        'Ñ': 'N',
        'Ò': 'O',
        'Ó': 'O',
        'Ô': 'O',
        'Õ': 'O',
        'Ö': 'O',
        'Ő': 'O',
        'Ø': 'O',
        'Ù': 'U',
        'Ú': 'U',
        'Û': 'U',
        'Ü': 'U',
        'Ű': 'U',
        'Ý': 'Y',
        'Þ': 'TH',
        'ß': 'ss',
        'à': 'a',
        'á': 'a',
        'â': 'a',
        'ã': 'a',
        'ä': 'a',
        'å': 'a',
        'æ': 'ae',
        'ç': 'c',
        'è': 'e',
        'é': 'e',
        'ê': 'e',
        'ë': 'e',
        'ì': 'i',
        'í': 'i',
        'î': 'i',
        'ï': 'i',
        'ð': 'd',
        'ñ': 'n',
        'ò': 'o',
        'ó': 'o',
        'ô': 'o',
        'õ': 'o',
        'ö': 'o',
        'ő': 'o',
        'ø': 'o',
        'ù': 'u',
        'ú': 'u',
        'û': 'u',
        'ü': 'u',
        'ű': 'u',
        'ý': 'y',
        'þ': 'th',
        'ÿ': 'y',

        //Greek
        'α': 'a',
        'β': 'b',
        'γ': 'g',
        'δ': 'd',
        'ε': 'e',
        'ζ': 'z',
        'η': 'h',
        'θ': '8',
        'ι': 'i',
        'κ': 'k',
        'λ': 'l',
        'μ': 'm',
        'ν': 'n',
        'ξ': '3',
        'ο': 'o',
        'π': 'p',
        'ρ': 'r',
        'σ': 's',
        'τ': 't',
        'υ': 'y',
        'φ': 'f',
        'χ': 'x',
        'ψ': 'ps',
        'ω': 'w',
        'ά': 'a',
        'έ': 'e',
        'ί': 'i',
        'ό': 'o',
        'ύ': 'y',
        'ή': 'h',
        'ώ': 'w',
        'ς': 's',
        'ϊ': 'i',
        'ΰ': 'y',
        'ϋ': 'y',
        'ΐ': 'i',
        'Α': 'A',
        'Β': 'B',
        'Γ': 'G',
        'Δ': 'D',
        'Ε': 'E',
        'Ζ': 'Z',
        'Η': 'H',
        'Θ': '8',
        'Ι': 'I',
        'Κ': 'K',
        'Λ': 'L',
        'Μ': 'M',
        'Ν': 'N',
        'Ξ': '3',
        'Ο': 'O',
        'Π': 'P',
        'Ρ': 'R',
        'Σ': 'S',
        'Τ': 'T',
        'Υ': 'Y',
        'Φ': 'F',
        'Χ': 'X',
        'Ψ': 'PS',
        'Ω': 'W',
        'Ά': 'A',
        'Έ': 'E',
        'Ί': 'I',
        'Ό': 'O',
        'Ύ': 'Y',
        'Ή': 'H',
        'Ώ': 'W',
        'Ϊ': 'I',
        'Ϋ': 'Y',

        //Turkish
        'ş': 's',
        'Ş': 'S',
        'ı': 'i',
        'İ': 'I',
        'ç': 'c',
        'Ç': 'C',
        'ü': 'u',
        'Ü': 'U',
        'ö': 'o',
        'Ö': 'O',
        'ğ': 'g',
        'Ğ': 'G',

        //Russian
        'а': 'a',
        'б': 'b',
        'в': 'v',
        'г': 'g',
        'д': 'd',
        'е': 'e',
        'ё': 'yo',
        'ж': 'zh',
        'з': 'z',
        'и': 'i',
        'й': 'j',
        'к': 'k',
        'л': 'l',
        'м': 'm',
        'н': 'n',
        'о': 'o',
        'п': 'p',
        'р': 'r',
        'с': 's',
        'т': 't',
        'у': 'u',
        'ф': 'f',
        'х': 'h',
        'ц': 'c',
        'ч': 'ch',
        'ш': 'sh',
        'щ': 'sh',
        'ъ': '',
        'ы': 'y',
        'ь': '',
        'э': 'e',
        'ю': 'yu',
        'я': 'ya',
        'А': 'A',
        'Б': 'B',
        'В': 'V',
        'Г': 'G',
        'Д': 'D',
        'Е': 'E',
        'Ё': 'Yo',
        'Ж': 'Zh',
        'З': 'Z',
        'И': 'I',
        'Й': 'J',
        'К': 'K',
        'Л': 'L',
        'М': 'M',
        'Н': 'N',
        'О': 'O',
        'П': 'P',
        'Р': 'R',
        'С': 'S',
        'Т': 'T',
        'У': 'U',
        'Ф': 'F',
        'Х': 'H',
        'Ц': 'C',
        'Ч': 'Ch',
        'Ш': 'Sh',
        'Щ': 'Sh',
        'Ъ': '',
        'Ы': 'Y',
        'Ь': '',
        'Э': 'E',
        'Ю': 'Yu',
        'Я': 'Ya',

        //Ukranian
        'Є': 'Ye',
        'І': 'I',
        'Ї': 'Yi',
        'Ґ': 'G',
        'є': 'ye',
        'і': 'i',
        'ї': 'yi',
        'ґ': 'g',

        //Czech
        'č': 'c',
        'ď': 'd',
        'ě': 'e',
        'ň': 'n',
        'ř': 'r',
        'š': 's',
        'ť': 't',
        'ů': 'u',
        'ž': 'z',
        'Č': 'C',
        'Ď': 'D',
        'Ě': 'E',
        'Ň': 'N',
        'Ř': 'R',
        'Š': 'S',
        'Ť': 'T',
        'Ů': 'U',
        'Ž': 'Z',

        //Polish
        'ą': 'a',
        'ć': 'c',
        'ę': 'e',
        'ł': 'l',
        'ń': 'n',
        'ó': 'o',
        'ś': 's',
        'ź': 'z',
        'ż': 'z',
        'Ą': 'A',
        'Ć': 'C',
        'Ę': 'e',
        'Ł': 'L',
        'Ń': 'N',
        'Ó': 'o',
        'Ś': 'S',
        'Ź': 'Z',
        'Ż': 'Z',

        //Latvian
        'ā': 'a',
        'č': 'c',
        'ē': 'e',
        'ģ': 'g',
        'ī': 'i',
        'ķ': 'k',
        'ļ': 'l',
        'ņ': 'n',
        'š': 's',
        'ū': 'u',
        'ž': 'z',
        'Ā': 'A',
        'Č': 'C',
        'Ē': 'E',
        'Ģ': 'G',
        'Ī': 'i',
        'Ķ': 'k',
        'Ļ': 'L',
        'Ņ': 'N',
        'Š': 'S',
        'Ū': 'u',
        'Ž': 'Z',

        //Lithuanian
        'ą': 'a',
        'č': 'c',
        'ę': 'e',
        'ė': 'e',
        'į': 'i',
        'š': 's',
        'ų': 'u',
        'ū': 'u',
        'ž': 'z',
        'Ą': 'A',
        'Č': 'C',
        'Ę': 'E',
        'Ė': 'E',
        'Į': 'I',
        'Š': 'S',
        'Ų': 'U',
        'Ū': 'U',
        'Ž': 'Z',

        //Vietnamese
        'à': 'a',
        'á': 'a',
        'ạ': 'a',
        'ả': 'a',
        'ã': 'a',
        'â': 'a',
        'ầ': 'a',
        'ấ': 'a',
        'ậ': 'a',
        'ẩ': 'a',
        'ẫ': 'a',
        'ă': 'a',
        'ằ': 'a',
        'ắ': 'a',
        'ặ': 'a',
        'ẳ': 'a',
        'ẵ': 'a',
        'À': 'a',
        'Á': 'a',
        'Ạ': 'a',
        'Ả': 'a',
        'Ã': 'a',
        'Â': 'a',
        'Ầ': 'a',
        'Ấ': 'a',
        'Ậ': 'a',
        'Ẩ': 'a',
        'Ẫ': 'a',
        'Ă': 'a',
        'Ằ': 'a',
        'Ắ': 'a',
        'Ặ': 'a',
        'Ẳ': 'a',
        'Ẵ': 'a',
        'è': 'e',
        'é': 'e',
        'ẹ': 'e',
        'ẻ': 'e',
        'ẽ': 'e',
        'ê': 'e',
        'ề': 'e',
        'ế': 'e',
        'ệ': 'e',
        'ễ': 'e',
        'ể': 'e',
        'È': 'e',
        'É': 'e',
        'Ẹ': 'e',
        'Ẻ': 'e',
        'Ẽ': 'e',
        'Ê': 'e',
        'Ề': 'e',
        'Ế': 'e',
        'Ệ': 'e',
        'Ễ': 'e',
        'Ể': 'e',
        'í': 'i',
        'ì': 'i',
        'ị': 'i',
        'ỉ': 'i',
        'ĩ': 'i',
        'Í': 'i',
        'Ì': 'i',
        'Ị': 'i',
        'Ỉ': 'i',
        'Ĩ': 'i',
        'ò': 'o',
        'ó': 'o',
        'ỏ': 'o',
        'õ': 'o',
        'ọ': 'o',
        'ô': 'o',
        'ồ': 'o',
        'ố': 'o',
        'ộ': 'o',
        'ổ': 'o',
        'ỗ': 'o',
        'ơ': 'o',
        'ờ': 'o',
        'ớ': 'o',
        'ợ': 'o',
        'ở': 'o',
        'ỡ': 'o',
        'Ò': 'o',
        'Ó': 'o',
        'Ỏ': 'o',
        'Õ': 'o',
        'Ọ': 'o',
        'Ô': 'o',
        'Ồ': 'o',
        'Ố': 'o',
        'Ộ': 'o',
        'Ổ': 'o',
        'Ỗ': 'o',
        'Ơ': 'o',
        'Ờ': 'o',
        'Ớ': 'o',
        'Ợ': 'o',
        'Ở': 'o',
        'Ỡ': 'o',
        'ù': 'u',
        'ú': 'u',
        'ụ': 'u',
        'ủ': 'u',
        'ũ': 'u',
        'ư': 'u',
        'ừ': 'u',
        'ứ': 'u',
        'ự': 'u',
        'ử': 'u',
        'ữ': 'u',
        'Ù': 'u',
        'Ú': 'u',
        'Ụ': 'u',
        'Ủ': 'u',
        'Ũ': 'u',
        'Ư': 'u',
        'Ừ': 'u',
        'Ứ': 'u',
        'Ự': 'u',
        'Ử': 'u',
        'Ữ': 'u',
        'ỳ': 'y',
        'ý': 'y',
        'ỵ': 'y',
        'ỷ': 'y',
        'ỹ': 'y',
        'Ỳ': 'y',
        'ý': 'y',
        'Ỵ': 'y',
        'Ỷ': 'y',
        'Ỹ': 'y',
        'đ': 'd',
        'Đ': 'd',

        //Currency
        '€': 'euro',
        '₢': 'cruzeiro',
        '₣': 'french franc',
        '£': 'pound',
        '₤': 'lira',
        '₥': 'mill',
        '₦': 'naira',
        '₧': 'peseta',
        '₨': 'rupee',
        '₩': 'won',
        '₪': 'new shequel',
        '₫': 'dong',
        '₭': 'kip',
        '₮': 'tugrik',
        '₯': 'drachma',
        '₰': 'penny',
        '₱': 'peso',
        '₲': 'guarani',
        '₳': 'austral',
        '₴': 'hryvnia',
        '₵': 'cedi',
        '¢': 'cent',
        '¥': 'yen',
        '元': 'yuan',
        '円': 'yen',
        '﷼': 'rial',
        '₠': 'ecu',
        '¤': 'currency',
        '฿': 'baht',

        //Symbols
        '©': '(c)',
        'œ': 'oe',
        'Œ': 'OE',
        '∑': 'sum',
        '®': '(r)',
        '†': '+',
        '“': '"',
        '”': '"',
        '‘': "'",
        '’': "'",
        '∂': 'd',
        'ƒ': 'f',
        '™': 'tm',
        '℠': 'sm',
        '…': '...',
        '˚': 'o',
        'º': 'o',
        'ª': 'a',
        '•': '*',
        '∆': 'delta',
        '∞': 'infinity',
        '♥': 'love',
        '&': 'and'
    };

    var Slugify = function (e, cfg) {
        this.cfg = cfg || {};

        if (typeof this.cfg.slug == 'undefined') {
            console.log('Error no slug field');
            return;
        }
        this.type = this.cfg.type || $(e).data('type');
        this.lowercase = this.cfg.lowercase;
        this.$slugify = this.cfg.slugify ? $(this.cfg.slugify) : null;
        this.$slug = $(this.cfg.slug);
        this.$title = $(e);

        this.register_events();
    };

    Slugify.prototype = {
        encode: function (str) {
            if (typeof str != 'undefined') {

                var slug = '';

                //str = $.trim(str);

                for (var i = 0; i < str.length; i++) {
                    slug += (char_map[str.charAt(i)]) ? char_map[str.charAt(i)] : str.charAt(i);
                }

                slug = slug
                    .replace(/-+/g, this.type) // Replace separators
                    .replace(/\s+/g, this.type) // Replace spaces
                    .replace(/[^a-zA-Z0-9_\-]/g, this.type) // Replace non-alphanumerical
                    .replace(/-{2,}/g, this.type) // Replace multiple separators
                    .replace(/_{2,}/g, this.type); // Replace multiple separators

                if (this.lowercase) {
                    slug = slug.toLowerCase();
                }

                return slug;
            }
        },
        register_events: function () {
            var me = this, $title = this.$title, $slug = this.$slug, $slugify = this.$slugify;

            // For text fields
            $title.keyup(function (e) {

                // store current positions in variables
                var start = $title[0].selectionStart,
                    end = $title[0].selectionEnd;

                $title.val(me.encode(e.currentTarget.value));

                // restore from variables...
                $title[0].setSelectionRange(start, end);
            });

            // For slugified fields
            if ($slugify) {
                $slugify.keyup(function (e) {
                    $slug.val(me.encode($slugify.val())
                        .replace(/([^a-zA-Z0-9]+$)/g, ''));
                });
            }

            // Check if it's empty first and populate if so
            if ($slug.val() == '') {
                $slug.val(me.encode($title.val()));
            }
        }
    };

    $.fn.slugify = function (option) {
        return this.each(function () {
            var $this = $(this)
                , data = $this.data('slug')
                , options = $.extend({}, $.fn.slugify.defaults, $this.data(), typeof option == 'object' && option);
            if (!data) $this.data('slug', (data = new Slugify(this, options)));
            if (typeof option == 'string') data[option]();
        })
    };

})(window, jQuery);
