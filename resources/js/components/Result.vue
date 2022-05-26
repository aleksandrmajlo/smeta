<template>
    <div>
        <a class="btn btn-primary  btn-lg mb-5 mt-5" @click.prevent="donvald">Скачать</a>
        <div id="HTMLResultConteer">
            <div id="ResultConteer">
                <table>
                    <tr>
                        <td class="logoBlock">
                            <img
                                src="data:image/png;base64,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">
                            <img class="twoLogoImg"
                                 src="data:image/png;base64,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">
                        </td>
                        <td class="tr_h1">
                            <h1>Коммерческое предложение</h1>
                            <div class="subtitle">Навес {{width}}м х {{length}}м. {{subtitle}}</div>
                        </td>
                        <td class="tr_date">{{date}}</td>
                    </tr>
                </table>
                <table class="uslCont">
                    <tr>
                        <td class="tdUslContent">

                            <h2>Основные материалы</h2>

                            <div class="resItemWrap clearfix">
                                <div class="text">
                                    <div class="title">Столбы</div>
                                    <span class="text_bottom">{{pillar_title}}</span>
                                </div>
                                <div class="num">
<!--                                    <span class="price">{{pillar_price}}</span>-->
                                    <span class="kol">{{pillar_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix withColor">
                                <div class="text">
                                    <div class="title">Ригель -<span> {{rigel_title}}</span></div>
                                    <span class="text_bottom">{{rigel_title_sub}}</span>
                                </div>
                                <div class="num">
<!--                                    <span class="price">{{rigel_price}}</span>-->
                                    <span class="kol">{{rigel_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix">
                                <div class="text">
                                    <div class="title">Стропильная система - {{trusssystems_title}}</div>
                                    <span class="text_bottom">{{trusssystems_title_sub}}</span>
                                </div>
                                <div class="num">
<!--                                    <span class="price">{{trusssystems_price}}</span>-->
                                    <span class="kol">{{trusssystemsr_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix withColor">
                                <div class="text">
                                    <div class="title">Обрешетка</div>
                                    <span class="text_bottom">{{obreshetkas_title}}</span>
                                </div>
                                <div class="num">
                                    <span class="kol">{{obreshetkas_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix">
                                <div class="text">
                                    <div class="title">Покрытие кровли</div>
                                    <span class="text_bottom">{{roofs_title}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{roofs_price}}</span>
                                    <span class="kol">{{roofs_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix withColor">
                                <div class="text">
                                    <div class="title">Краска</div>
                                    <span class="text_bottom">{{paints_title}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{paints_price}}</span>
                                    <span class="kol">{{setAttr(paints_kol,'paints')}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix">
                                <div class="text">
                                    <div class="title">Комплектующие</div>
                                    <span class="text_bottom">{{accessories_title}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{accessories_price}}</span>
                                    <span class="kol">{{accessories_kol}}</span>
                                </div>
                            </div>

                            <div class="resItemWrap clearfix withColor">
                                <div class="text">
                                    <div class="title">Тип монтажа</div>
                                    <span class="text_bottom">{{montaches_title}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{montaches_price}}</span>
                                    <span class="kol">{{montaches_kol}}</span>
                                </div>
                            </div>

                            <h2>Дополнительные материалы</h2>

                            <div class="resItemWrap clearfix" v-for="dopmaterial in dopmaterials">
                                <div class="text">
                                    <div class="title">{{dopmaterial.title}}</div>
                                    <span class="text_bottom">{{dopmaterial.subtitle}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{dopmaterial.price}}</span>
                                    <span class="kol">{{dopmaterial.kol}}</span>
                                </div>
                            </div>

                            <h2>Услуги</h2>

                            <div class="resItemWrap clearfix" v-for="service in services">
                                <div class="text">
                                    <div class="title">{{service.title}}</div>
                                    <span class="text_bottom">{{service.subtitle}}</span>
                                </div>
                                <div class="num">
                                    <span class="price">{{service.price}}</span>
                                    <span class="kol">{{service.kol}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="tdUslImg">
                           <!--  фото результата         -->
                            <div class="resultImageBlock">
                                   <span v-for="photo in photos">
                                       <img :src="photo">
                                   </span>
                                <template v-if="base!=''">
                                    <img :src="base">
                                </template>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="Price_Srok_Title">
                    Цены и сроки
                </div>
                <div class="Price_Srok_Table_Wrap">
                    <table class="Price_Srok_Table">
                        <tr>

                            <td>
                                <span class="item">Материалы </span>
                                <span class="value">{{numberWithSpaces(result_data.material)}} ₽</span>
                            </td>
                            <td>
                                <span class="item">Работа</span>
                                <span class="value">{{numberWithSpaces(result_data.work)}} ₽</span>
                            </td>
                            <td>
                                <span class="item">Доставка</span>
                                <span class="value">{{numberWithSpaces(result_data.delivery)}} ₽</span>
                            </td>
                            <td>
                                <span class="item">Изготовление</span>
                                <span class="value">{{numberWithSpaces(result_data.production)}} дней</span>
                            </td>
                            <td>
                                <span class="item">Установка</span>
                                <span class="value">{{numberWithSpaces(result_data.installation)}} день</span>
                            </td>
                            <td class="itog">
                                <span class="item">Итого</span>
                                <span class="value">{{numberWithSpaces(result_data.total)}} ₽ / {{numberWithSpaces(result_data.period)}} дней</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <h2>Похожие навесы изготовленные нами</h2>
                <div class="PochogNaves"></div>

                <table class="about">
                    <tr>
                        <td>
                            Организация<br/>
                            ИНН<br/>
                            ОГРН/ОГРНИП<br/>
                            Расчетный счет<br/>
                        </td>
                        <td>
                            {{requisite.Организация.title}}<br/>
                            {{requisite.ИНН.title}}<br/>
                            {{requisite.ОГРН_ОГРНИП.title}}<br/>
                            {{requisite.Расчетный_счет.title}}<br/>
                        </td>
                        <td>
                            БИК<br/>
                            Банк<br/>
                            Корр. счёт<br/>
                        </td>
                        <td>
                            {{requisite.БИК.title}}<br/>
                            {{requisite.Банк.title}}<br/>
                            {{requisite.Корр_счёт.title}}<br/>
                        </td>
                    </tr>
                </table>

                <table class="contact">
                    <tr>
                        <td>
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAVCSURBVHgB7VhPTyRFFH/V3UMwbrS9eEGzvdm9GdcmghIv2xjBvTHcENkwfALgEwCfQPgEO5OA2ZvDbRWU4aQB1GE9edjQe1DjyUn0sOv0VPlez59+Xd0zPQPE3WT5JWSorlevfvXq1av3CuAKLykEXCImvDmn/f9TeFqrVso1uCScm6jr5W3LuuYKoRZBGB4o5egySoka9leB/pQqHe99WYVzYmCiRHBo6NqylGIFSdgDDQbhAzQ2kHARBsRARMenFpbRSuuDE0xM69fr9clq5YHf94h+hFrbfF8IyGfJKgVlVOqh5szFoL71o2+2N6APmFkCLh6QXO6V71HphEaogj9LSCqPpIabEyvfNBufoVv8KYS4y6SLuBO7hkF+LPgCvLdu3YbfHj86zOJhQE+SeTuXyx3gRA77XFNKrZ7sb08KIZ2Y5aQo/fDwgX+yv7OpIFxICyIfBNamYTQmUVcJ4gte/2B6YQ0uQpS2m5NsWiwYJSLhJGAs876j/e31iAHwLUXXqRdoEcd7OwVaKGhkP/z08xU4D1E6ONwniQhZhCYL+715F7fdjfphi49Hi1e4VdEVZqI+Wqhc4vLoLmsui8N9EW0OECvdSIaKTaPAxwjRKCcUKbXLWt5HH89fbzcoRGmWRTez7sMgRHM5c41vOSrc4CRDYgbciQhBRe8nBEGuyNv/GmKWt5O+DN7YJwsepCARnlyvYOes4Cx2SAQFag2KLwRvIAPSr8sMOSXB5nEZXaiMIWs2k+j41HwBDd11C/4H1Op160a1UowtKLH1Shkz8Hxhm0PPPP2jpX8Ib5UIFQwdiWCM20OLcZv/Kx9PbAm6AMfbhgEsjEFZSjhNmXe57W6GMj38KXclSv4JImA3hyyd7CcTiLGphTvMZ05PePzUQDoNI+gQDQK5+9N3XXV6zcUkM7HY1ltW4PI2uoEP6bAjGfgLeiDha4bhpMkJUE/YvO9BL6I6hqQ8S1cqGFHxBDKREjU0oJ6eMj2J9gPRR5Z0GYgRFYGMbdMzS42mDVKgmJx6HTKR9DkdMb8UKhGTY0TrMOTHBst0f0KmfjQBvAE9EB5QBimln65SXI+EkpdHSsC/dxZZgPxGViABw2NWQqUqec+3CShhxxJuymMxpCUlRYE1to73tmPZlJUcIDFuCqel1dEUdGZjsNNlWtPrphAUgnoXFlQl6N9SbiZRhOcIukAoRdS/JyyKmXgVk5IaT0paZYemMHaDYdYPqaVwmLNGuhJyrajh9porlSgFaEy1tnCCTnmAZj880m4fvEkO2HVbpdJE19WstywWi+WqftO1zkSnjTVXarGXGkepvhHM4ZWANcyqYrcWxHMAL9EPdNNZBd42zfjBHAtrJR66VDEtr+1KlKzaaIhVTfSAlwq0GN4rlJEopbH8WIw4xJNrIimwVopkwwq2a+nc9Wb68dttynJ4HUSlws/vTy/k24vh2TlafZnHzGZey4O47GRY49P3vuAkw/FKzXazJqFnXf/H2aOHIzdv34DI2YfRL+dGbr1rv/n2O79ignGKh6HQ7jOtxvDvj3/5mhojN92voJW8kLWwRlqiMgP1UVI+p5Ek3y334tLXSwlWpEX8WdSG+ji6jFuaj/uZHFXCmIlbTBVbsdnTdTdJ7mxCBvp+e0Jr4JsTZD4UICj8uFlCrYR7KS1mpsrDAJi4O+dIaR7gpeDAxbD1av2f9coA76fneh+lg4LJ7aIW9LMQ5gS4yFK/VuS40IszWTgITPRRQTW+g8Qd6GT/wkf/w4dcedgAs/pa/e9y5RJfoK9whRcN/wEYBzZCtIImlgAAAABJRU5ErkJggg==">
                            <a :href="'https://'+requisite.Сайт.title+'/'">{{requisite.Сайт.title}}</a>
                        </td>
                        <td>
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAGBSURBVHgB7ZY/TsMwFMaf3bwFFZEj5AhBohVjlmTuCKVI3IDeADgB3AAm1pYLkEys6RHKDTJWjdDDjhSJVEqcP46UCv+GSImfo0/29z4bwGAw/C/Y4YdL78qBAbCDXbKJ1kn+XhA6CW6fgWgJg4Bt03R0voneMrH87xARuTAYyDnh+7P8jcORYKkKiGDNiBLoG84c8fTKhpVCGadtusen3Ct94HozG/l4VVWj3npiS8Sf2O0pDVx/7iKexlCxmpKaHiUH0Yon/vwONDLxF/cIPJb/V9U2aSZblL9Og8UDdERudRaFAC915zTuetFcj2IlwrZWkPMQx2HTvG4bTx4ihsIKjXJ3GlzPLAulHxvndYcclb7icV0rXIg6otGKMbKhBcp4UpFZIbixyyIsix4U0UPVXa1Cz8lUEmF1o6cOGo/QYoQ1iZ46dN76A7IIkyKhRcNU0delRPst7GhuT0aoboxQ3RihujFCdWOE6qYolOgDBoK450Zfn+/fYDAYDMPmFzaccGFq/VJGAAAAAElFTkSuQmCC">
                            <a :href="'mailto:'+requisite.Email.title">{{requisite.Email.title}}</a>
                        </td>
                        <td>
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKKSURBVHgB7Zgxa9tAFIDfk+ylzZAf0MGFrgUHEuhoQ1O6Nd1CMdT5Ba1/QZxf0PoXJAG3ZLS30hikbsUp1KVzQUt3LemQSHp9JyNwo5N0OuVEA/7AyJxO9nfvdHfvDmDNmv8bhBrZftrroEUvxPfrq3C0cM881WdrE91+1jtEguFqGSL1558/nKo8b0MNyCSX4N6DR4+9379+/ij6DeOi2ZIJarJGRYslE4pljYmqSybkyxoZTDu7r/oA1jFoQATdb7Oxe7PcAgMQWG9AE0Q4lJUbEUXATdCnLSs0IgoQfQF9pI00Imrb4ZAncw/08GWFRkS/fjrzLCvsaskSLGTFhrpeX5aAprJyY6ICHVmu68rKjYoKhCyR2t+IBl2cf6y36xN2dns8p1JLpS4RHWXdMyra7uy3iHCoUldE07YjN+t+AxQRSS9f+EN+EISToqS33dnbbDabDtdXmvy5QVPxmmTdV4ponGAgOGJ5Q8R3zWbjO6/n7XzJDUe1y5fRDN7n1SkUzciCOEqWI5MV3b2UhMyG3ES8m3nRFKCG5Cq8ikTdZKTGeyLEY9VIxgIcTd6OPCysB/qSq7IDjvBriN/hUvjc5VtF0RRIRcsnvbpEB9wbJyo1U6M+TnprkORAHM1napKC1GCqkvSWYDSfjYdlHkiJcktbYJbTi/PxWyhJOqIoT7NuA9HdLNkHDVKiDTs4qJD0ZsJz5aBsd68iHfVPnu+3osh2eFlrQUVEo1nyZVZWpIp0ZaqUof/L6N7V5VZVSUHuyqQbWd6bu4jR4DYEEwoPIMrIsuCELyPZAUJVlE5KcmR9ijdjNN0ILk9cd+KDIUod6YhsKQQ7zopsCBf3r/94JuXWrLlL/AWdRyeB2INxRwAAAABJRU5ErkJggg==">
                            <a :href="'tel:'+requisite.Телефон.title">{{requisite.Телефон.title}}</a>
                        </td>
                        <td class="social">
                            <a href="" target="_blank">
                                <img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAuCAYAAAC8jpA0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANMSURBVHgB1Zk9b9pQFIaPTZItCXsixUukJEvIlLX5CcnUAYmwA+2IxFBlo2PhD4DEDH8AqV2ZShZAQkKuBEMlBgMjXz2vy0WGAErwuUp4JPt+YfRyeO+5tq9BG7CY/f39T9Pp9No0TYvLILq9H6HtcWYHsA3DcCaTCcpnblebzWZ13YUGvRQaPDg4+MICH32K8ovNxxOLzy0PLIg+Pz8PcVGi9xW7jD0cDu9sRnXMRV9cXFjj8fg3V4P08YCN7pRlTNXLgn+SoOCHhwcSBLpKsC4armi2xSMJWyKdTpMw1t7e3ldUVKS/kSBHR0dueXJyQpJwZomgNGeTzyJBDg8PSRMW9CLSIdohOJeHTJxImNPTU7fUFPGQyT45I01IexoEAgELosXzshJ7fHxM0vBKfQZPWyTM5eWlW/KCRRoImqQBJVaJlwaixe1xdXXllhCtYTIGxUVj+VZCschoiLa8Pe7v7xfa8XicpBEVjSjf3t4u9KG9/EP8IiYaNkilUivH0C+ZSUREI8KFQmHtpIO3MS51u2rwDciUtgACkSVisdgLS2yiUqlQPp+ncrlM27JWNESpFQ11rHKIGP5mWAGC/aSzwWBAtVqN6vU6NRoN6nQ6br8qe72e+5lXicZfqOEGfmuSySQVi8WFvrWR9t7sqDoijDrKt1hiFd5I40C73+/PIw3QXhXtrT0NkMqi0eibMgM8nc1m50K3wZdoRSQSoUQisdHjEJjJZNxJ6BcR0QCWWZf2IDgcDrvRlUBscYEgRHIV6JcSDESXcfz18KwXiJWwhBfxGyZMMi+5XI6kgWiHBMFCobICUlapVCJhHHHREIr8CyR97MHR8riFaANNouXtAZRY7+omBT+N2yZOJIzytLZIs+g/JEy73SZdsN5nvKyxSRhMRqDDHtAL0b9oh4Bec7YlID4ZNWFDr5vy2Cc/SJDlpxBBnnAK4MSPUVV+G/mZBF/cYDKqfC0EohxFZb67NdsREN0sEsThbbkbtS03XxHhFY72Df3fdPxI2Hws7CMGvKPdbtdhq+R5S/kvz1I8Q71n1B2ea99Ho1G01WrZ3gFj01WwDF+IvXGLf8S1e4FhWLNhi/xj48Tfj+xlY6FDHkZa27Q3vpP8A6c7cPkvRXHlAAAAAElFTkSuQmCC">
                            </a>

                            <a href="" target="_blank">
                                <img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAuCAYAAABTTPsKAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAPbSURBVHgB1Zk7aBRBGMf/s4neKeJtEBMRHxcLRVC8A9MpXMDSwmBp4aO0ydkq4omoZbSxU5PCUrSwU8mJdhY5TREShGwiviLBjWg0rx3n27sl2Z19zN4J2f3Bcnff7tz899vvMewwhHFjrIQ2VgDTjoBzHRx5MOiNs3rjaAazcQiY0bDVAGsKK7yGqwerQQOZZKmM6Mhs6Qe3yi0IahVDOGkQC8tDqBw01p5wC745UYDGn9ieTAYG+FIfrhyqOYZVwSSW8WGsn1eDMIXoXkd0XfDtsTygDSfIs14MLM4XUSmamv1zhZ1KsFgijw1ZyinUBbexfiQdptkaWSN2R5AG+FJRA7NKSAusvaQlPHbdCK2a3cXSgkaC0wRne4WHeR7pQW8PO5vPtYtjo8tmzC2KY9n3+kJXBnqmzWWrTs8jiNKeza7f5sIKat8WEEa7COTAVnzucA7Xjm9z2a6/nkXlzazv9QMntksi2O0J32tP7d+CJ6d3Sv8dIVinGI61dtCz/yfs+3vkaavTf6KG6aGzG3NLki3neeTNQE/B+yRorrDwcQgVbC5Yko3itBXoCT08uUOyUzioECrYL57yuQ1ohYETnXYyr4W8Ozj6U2l8ZEh4vUweKu3ZhLg4nj13eKvLTv/f++ij8v9EZpBfXFGGq1K/wc0YuZCXxBLnn30JLJN+RAp+NSVn7llR7lSrxeTFfRg+s0sKA/Ls+Wdf8XTiN+IQOevg6JxkI7Hlox1QQc/IU1CoURioxu1aIgWbfy3fsOjv6ZC8Fge/G1FBaZRfySEvU6dqppFQpRk+s1vqoioozUYdaOi9/PgKXVmRTHtDPV2bCW61lWPbROXoQhyU3VN+OeObzeQtSiwqWXpW7oLF+1PoGPhgJ5jfeFqvxBGtLJhiue/xp8DzVLIKnZnAsZRglGhPJ375jM2h3KOWxLECkDofecqvZatA1aHv8WcM+VSHayI8VJI4dsY4nopT7L2UX8xIsR20xvBCgk3EhDxdfGDg7tsfaAYKkUvPZyQ7dcSIqiPe/LD4gp1Jyy++o/vepB0mCmtZF3S9X32PaEhm85W/QX2lVV9tkXcKnVn7U6UxXBI37E3UqFBjuDVOb30KSAWsSm4wkCLEmx8+hbTArXeUdAbSgtAqPKxVkRb4crX+Bv7WOBXUpG0VeDFw+UB3vfZw6y6SDreG6KMueCl7J+GxbECUevri3UVK5pt4zoq4st/eRVptR2SgE8nytIkVq9cRS7j7p31CXAARL+srXOzNWdfFVle3dxuXhQ5z7TXT1gJ39pdb2Wd2MNZ8r4ExEvkuaq85dfwD6zV29Q/W3CwAAAAASUVORK5CYII=">
                            </a>
                            <a href="" target="_blank">
                                <img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAuCAYAAAC8jpA0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAUISURBVHgB1ZlNbBtFFMffrDeBBCqsFIpKg7IRjYRI1caqcMopyZFwKUVGSK2UXFBK+CqHnpPckLgUREOlXkAUCWQQvZAe61xATRWlqWiRoEhrlKjCUdItLa6a2jvMf5x17c16dvwR6vwkJ/bu7O5/37x5780MIwWHfzlutbS2DHKDDhgutzijKHFuPWzBLKodh4g7hdswm3FyXEP8d/OLlKcryfj0lUoXMv+Bwwsnoq2U+5C7fLROUXXCbfGZSh6c/tJ/pkx0Ym68jyLsx0cr1g+3H6znh86/csb2jhRFv7Vw3Mq75oL4GqXmw6G8O+S5jOEdzbuRi9ScgkEUHgDXxQ8pOjH//mhzuUQQzDJzuRP4tmFpd4K2AcxgI/J/YfAZC9QArLY94tNJ7WYbPRFpk8fs7DKtrK+SfW+ZGkLejZkUifSJEUq10vvkXhp4+hDFn9pP7RtCg8jm79Gcc5VmVy/Rtbt/UK3kifpMl/M+g1V/MSw68vwRIbpHqz1eaHBnv/xA9Bf2N5QRPVAtzDD6IvvG4mPi+4vVXDi8a5BOvvA27WrdSbWA63APcP3uDaoGRvxvk2Rq1r9ovOuosNYhagSJ3cOiB9rpq6Uf9C8yWJdRXkuoGe080jDBHq8Ji493HdO/gLOoods2sftV0aVDtBXAzz130cEUXhKaBeGD6Eo/GFCIBu1GG7353LAyeoQx2vkGXb9zQ4TGpZCWXFo6VPQ71tFNxxB3p37/jFJC9MxKin7KXKR6GRHup0G4eyAOB4W10/bXZb9nMimql94dPVohNFT0QMDA+1ckirQvw+HYtTu1J42Hz+sPbRMqOh7dv+lYJb+7INykXl4OeJ4fpehu1BEBg6tSUukStUe9oGYJu49S9DOPdQQfb+2QabwUWCgowtRCd3un8rxStOqN/b5nNcDKHjCKCu3k4geZrNTaiB4r62v0f1CzaICiyfN5RI9P/jwrS9CtRik6zHLoxlI/RlSZFAknSDjudfn2VdIBEwcVStHpbPhsA26CuqT4QCH85G8fb3rh6fQ52RPv/johs6jKIFlX3VuR3rH4ZKWTTu4fIWqIWowWUoFMBrzaGJaWPn5/TU69ZjKz9POt+eI5WPyymMUgdO55/Nmye8HNzv71nfJ5JoUw5yxqlaOemyRvXigeS61dkp8gYGn0ij+Z4GXCCB2Is6tzpAuET/R8oD2j8cd6+bwKL1lKqGiUn9XUFHCVz/dNysJeJR41tN/Kus+Ce2DlUlmefi+63PNbXUonsai57eyS9GdEHBRhgwGF0bR9TufWjllYblVPBPBgVHW11BYoNXXKTYwFveTEHK3kgm7uamCa9oMQmLw5o93e4Jw5YY1e2rGXtgoIRgzXhXNuG4yRHdZQpzCvBbhENYI9xAoTpVUrTHANzycxkGAZJIfM/VUat45przCVgjGCwV3LTEcs0SyaTJhb7HlUbISSE9kNQv0PwcQWUWWgo1/OcELX8m5vrOXVMS2D3oaumuIF/DOPQuZbliGvIYhVU2nixPx7t6h5dwFK4Hby4OluGfK4S5/StoBP4a8UnTPNU4UtsGYGVi5sz0nR52OnxO4Rf50KKb0ZcbAt5/0oZkRsd0WMXKz5LC70iO240n3EsjT+beyM/cBoiYnd2o+aQLwjxtoU9Pi3nJUbFwiHnDGxN84ssXd9QF7AvPVsZlHdFAyDUkIIsV1GaeaKOMx5SrU3vi35D5wwCxwz/f4lAAAAAElFTkSuQmCC">
                            </a>
                            <a href="" target="_blank">
                                <img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAuCAYAAAC8jpA0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQMSURBVHgB1ZlNTBNBFMffLG2jHHT91sTGrYkmEqPgSXvi44IfMYIHvEmicAUTDsbgByYSEzjIwYti4lEPwkWMF5HECCQmAgloggfWSAKEqAWjAoUd5z/braWUdrct0P0lzWyns9v/vH3z3mQeoySo1zs1L/mKlTx+nDjTiHGVOGnRASzm2iGcUYgZFIo8RxcdIfF83eDGEIXzBqdbzg6udi+L71DrO1Vfvq+OEa/ORFQWwASappvPP43/YZnoXTe6ChXGO8WlRrmDzpbCJZP3K3SrIyp6r3AFw+MdYJxUyj1CBmcl082myyhWL8/zvs1RwUCFB8B18UWKFm5RTbnlEonQfPmeelxI0WIWt8kFMKZclm1k8Q2QSzAWWBEsXUhuwrtUqChkuEq0QqxQ4YpygFwF04Q78w0Nc1s2eag2GKCOKyepJqilvoHRAY/cSzBad4KBHVIsWggHvWPfbdzJVA+tI5ZVa4MHo0Jj6R37Yes5Hq6QKjLhmgFxwcBOIVSTVk3G8MQMpYarnrVK3RBYfmQPXTrhX2HV2bnFFX0jE7Oy3wbZdQ8IgUiIXc2qrd1fxDivtHws30J/yC5ZEQ2BVUX76XTB3oS+CrDIbr36JCdUmyBKvLe1CE3SFp1qUVnglbd0j9Lj3jG6e6ZA3pOIkYlfZBfHomHVhtJDKRcVeCSEtgrBEN528Zh4G/5Vx9pbhCa2RPvVzVR1Yn9Kq/4XMCtdAS6B8UgcySbpYBHaF10j3SCQchz+2LIuMAWfoqP7tiS9D5N0gi3RsNrrz1PS2lhwiYBV614MiSjwV37H2+m4ekq2qRietO8awLZPQxQ+rW9GzWghJmC9coQxy7pOBQMni9CRaAtY8vnAuPxA1IeG0mUx1qlg0Osg3AGFMgATwB8GNdPi6yEYZCQawNfLC/bIa7iME8HA6SIEGYt+9nGctoq0DP/2q/nklJGNED07FzZdJLCd/NucWRkMT26AaADRSDyxCQTxuvJJf1JLzogJp2VpnF5ShmDzHpspb4q4bmXEsofvZEhMRDqCBSEletyaARCHsIeMCOticxQLYjj6rcRjMZyWaBbK2n66sr1ftvHCLDCxyvY+aig7HM2qfWmEO+CRh9uUOauJjR+DVA8LY0+dnqW5znY3dnWKY4QL5B56hE8bX8lNcD4kTpmYTm6CM10RJ+w95CKMRdYj1+Duxpc/c7gKEIs+de9cwMyIBm8jF8BEtQutFL3gW3wgGp1yG30yUp6TokN3KlA9qshGSl8LZC4RZTnre3TDhHKXshguotyzuM4NtqyOuGyXhx/mvVL4Ndpg8dK6jDfN/w4XWfVDi6QZPFJEKhYBXZxhs+Pm0yKlu2yUoLlpGFOgyBdIdKJFGI4X6nr+ATi1vdrEhYWjAAAAAElFTkSuQmCC">
                            </a>
                            <a href="" target="_blank">
                                <img
                                    src="data:image/png;base64,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">
                            </a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="form-check mt-5 mb-5">
            <input class="form-check-input" type="checkbox" v-model="my_result" id="my_result">
            <label class="form-check-label" for="my_result">
                Свой результат расчета
            </label>
        </div>
        <div v-show="my_result">
            <div class="d-flex flex-wrap" >

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Материалы</label>
                    <input type="number" class="form-control"   v-model="result_data.material">
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Работа</label>
                    <input type="number" class="form-control"   v-model="result_data.work">
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Доставка</label>
                    <input type="number" class="form-control"   v-model="result_data.delivery" >
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Изготовление</label>
                    <input type="number" class="form-control"   v-model="result_data.production" >
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Установка</label>
                    <input type="number" class="form-control" v-model="result_data.installation" >
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Итого сумма</label>
                    <input type="number" class="form-control"  v-model="result_data.total" >
                </div>

                <div class="mr-2 me-2 mb-2">
                    <label class="form-label">Итого дней</label>
                    <input type="number" class="form-control"   v-model="result_data.period">
                </div>

            </div>
        </div>

        <a class="btn btn-primary  btn-lg mb-5 mt-5" @click.prevent="donvald">Скачать</a>
    </div>

</template>

<script>
    import {eventBus} from "../app";

    export default {
        name: "Result",
        props: {},
        data() {
            return {
                date: this.th_date(),
                url: process.env.MIX_API_URL,

                photos: [],// массив фотографий
                base: '', // загруженное фото

                length:0,// длина
                width:0,// ширина
                heigth:0,// высота

                subtitle:'Метал, Поликарбонат',// то что выводится в заголовке

                pillar_title: '',//столбы
                // pillar_price: '0 ₽',//столбы цена
                pillar_kol: '0 шт.',//столбы кол

                rigel_title: '',// ригель
                rigel_title_sub: '',// ригель название выбранное
                // rigel_price: '0 ₽',// ригель цена
                rigel_kol: '0 шт.',// ригель кол

                trusssystems_title: '',//стропильная система
                trusssystems_title_sub: '',//стропильная система
                // trusssystems_price: '0 ₽',//стропильная система
                trusssystemsr_kol: '0 шт.',//стропильная система

                obreshetkas_title: '',//обрешетка
                // obreshetkas_price: '0 ₽',//обрешетка
                obreshetkas_kol: '0 шт.',//обрешетка

                roofs_title: '',// покрытие кровли
                roofs_price: '0 ₽',// покрытие кровли
                roofs_kol: '0 м2',// покрытие кровли

                paints_title: '',//краска
                paints_price: '0 ₽',//краска
                paints_kol: 0,//краска

                accessories_title: '',// комплектующие
                accessories_price: '0 ₽',// комплектующие
                accessories_kol: 'Комплект',// комплектующие

                montaches_title: '',// тип монтажа
                montaches_price: '0 ₽',// тип монтажа
                montaches_kol: 'Комплект',// тип монтажа

                dopmaterials: [],// дополнительные мат

                services: [],// услуги

                result_data: {
                    material: 0,
                    work: 0,// работа
                    delivery: 0,//доставка
                    production: 0,// изготовление
                    installation: 0,//установка
                    total: 0,
                    period: 0
                },
                my_result: false,//показать свой результат

                requisite: {
                    'Организация': '',
                    'ИНН': '',
                    'ОГРН_ОГРНИП': '',
                    'Расчетный_счет': '',
                    'БИК': '',
                    'Банк': '',
                    'Корр_счёт': '',
                    'Сайт': '',
                    'Email': '',
                    'Телефон': '',
                },
                datas:{
                    tube1:[],// столбы
                    rigel_types:[],// тип ригеля
                    tube2:[],// ригеля
                    type_trus:[],//стропильная система
                    trus:[],//стропильная система
                    obreshetka:[],// обрешетка
                    roofelements:[],// покрытие кровли
                    paints:[],// краска
                    accessories:[],// аксесуары
                    montachs:[],// монтаж
                    dopmaterials:[],//дополнительные материалы
                }


            }
        },
        created() {
            axios.get('/dataPDF')
                .then(res => {
                    const requisite = res.data.requisite;
                    this.requisite.Организация = requisite[0];
                    this.requisite.ИНН = requisite[1];
                    this.requisite.ОГРН_ОГРНИП = requisite[2];
                    this.requisite.Расчетный_счет = requisite[3];
                    this.requisite.БИК = requisite[4];
                    this.requisite.Банк = requisite[5];
                    this.requisite.Корр_счёт = requisite[6];
                    this.requisite.Сайт = requisite[7];
                    this.requisite.Email = requisite[8];
                    this.requisite.Телефон = requisite[9];

                    this.datas.tube1=res.data.tube1;
                    this.datas.rigel_types=res.data.rigel_types;
                    this.datas.type_trus=res.data.type_trus;
                    this.datas.trus=res.data.trus;

                    this.datas.obreshetka=res.data.obreshetka;
                    this.datas.roofelements=res.data.roofelements;
                    this.datas.paints=res.data.paints;
                    this.datas.accessories=res.data.accessories;
                    this.datas.montachs=res.data.montachs;


                    this.calc();
                })
                .catch(err => {
                    console.error(err);
                });
            eventBus.$on("changeCalc", () => {
                this.calc();
            });
            // фотки получаем
            eventBus.$on("changePhotos", (data) => {
                if (!data.base) {
                    this.photos = data.photos;
                    this.base = '';
                } else {
                    this.photos = [];
                    this.base = data.base;
                }
            });
        },
        mounted() {
            const self = this;
            $('[type="number"]', $('#fornZakaz')).on("input", function () {
                self.calc();
            });

            $('body').on('change', 'select,[type="radio"],[type="checkbox"]', function () {
                self.calc();
            });
        },
        methods: {
            // основная ф-ция подсчета
            calc() {
                let self=this;
                // длина ширина высота
                this.length=$('#length').val();
                this.width=$('#width').val();
                this.heigth=$('#heigth').val();
                // столбы
                this.pillar_title=this.setTitleById('tube1',$('#tube_1').val());

                // ригель
                this.rigel_title = this.datas.rigel_types[$('#rigel_types').val()];
                this.rigel_title_sub=this.setTitleById('tube2',$('#tube_2').val());

                // стропильная система
                this.trusssystems_title=this.datas.type_trus[$('[name="type_trus"]:checked').val()];
                this.trusssystems_title_sub=this.setTitleById('trus',$('#trus').val());

                // обрешетка
                this.obreshetkas_title=this.setTitleById('obreshetka',$('#obreshetka').val());

                // покрытие кровли roofelements
                this.roofs_title=this.setTitleById('roofelements',$('#roofelements').val());

                // краска paints
                this.paints_title=this.setTitleById('paints',$('#paints').val());
                this.paints_kol=parseInt($('#count_paints').val());

                // аксесуары
                let res_acces=[];
                $('[name="accessories[]"]:checked').each(function(){
                    res_acces.push(self.setTitleById('accessories',$(this).val()))
                    // console.log(this)
                });
                this.accessories_title=res_acces.join();

                // монтаж montachs
                this.montaches_title=this.setTitleById('montachs',$('#montachs').val());

                // console.clear();
                // console.log(res_acces)
                // console.log($('#tube_2').val())
                console.info('calc')
            },
            // установить название  по id
            setTitleById(name,value){
                let datas=this.datas[name];
                for (let pr in datas) {
                    if(datas[pr].id==parseInt(value)){
                        return datas[pr].title;
                    }
                }
            },
            //дата
            th_date() {
                const d = new Date();
                let day = d.getDate();
                let m = d.getMonth() + 1;
                let y = d.getFullYear();
                if (day < 10) day = '0' + day;
                if (m < 10) m = '0' + m;
                return day + '.' + m + '.' + y;
            },
            // загрузить pdf
            donvald() {
                let html = document.getElementById('HTMLResultConteer').innerHTML;
                axios.post('/pdf_generate', {
                    html: html
                })
                    .then(response => {
                        var link = document.createElement('a');
                        link.href = response.data.link;
                        link.target = '_blank';
                        link.click();
                    })
                    .catch(err => {
                        console.error(err);
                    })
            },
            // установка аттрибута
            setAttr(val,type){
                if(type=='paints'){
                    return val+' шт.';
                }
            },
            // число в читаемый формат
            numberWithSpaces(nr) {
                return nr.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            }

        }

    }
</script>
