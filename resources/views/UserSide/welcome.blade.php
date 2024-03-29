<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ready4Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
            {!! EuCookieConsent::getPopup() !!}
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Home</a>
                    
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar sessão</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registe-se</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-center h-16">
                    <div class="flex-shrink-0">
                    <svg version="1.1"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="402px" height="402px" viewBox="0 0 604 604" enable-background="new 0 0 604 604" xml:space="preserve">  <image id="image0" width="604" height="604" x="0" y="0"
                            href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlwAAAJcCAMAAAAbwoqCAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                        AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAANlBMVEX///90gcN0gcN0gcN0
                        gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcN0gcP///8b2DVIAAAAEHRSTlMAMEBw
                        gKDA4PBgkBDQsFAgkXSs5gAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAHdElN
                        RQfmBggUEhlBjVzPAAAmRUlEQVR42u2d56KjOgyEU0kh7f2f9t7TQLZGtgELSHa+X7s5CRh7kGS5
                        bTaEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQggh
                        hBBCCCGEEEIIIYQQQgghhBBCCCGEEMh217NdujDkA9ju9odj05xemnPTHA+H3W7pIpL3Y3c5QE0h
                        lV33u3bp8pL3YLs/3opkJTndDzRiJMnu0AzWVc/t+qAJI4jtfoqweoHRgpGQx7UswiqKwo4XGjDy
                        y+N4rqasX+7UF/nfG9ZX1g/Hx9KPRhal3dfzhsA/Xp9LPyBZit3RUVk/NJelH5IsQHvxNFo9pwOj
                        r3+M9uAUaSGO9I7/EE9/f0h5/ZvMLi3K619hEWlRXv8C7WGELM5N01wPgqYpnDIRyYuh/SczLIw/
                        /y+phz2dZrc7XIeJ7HxYugKIF49yJZyOh9JJWrv9tXyKzolp+4/kWTrpoTkMnzmz298LjWLD0Ovz
                        KAu2ThOmZG0PRRaMvvHT2JV4xNt+qlVpL/eS+3CFxwfRXudQ1u+9SvRF4/Ux5M3Wqer8hfaS9Y80
                        Xh9C1mw19btwz2smvj/vl64WMp1txoqcvTLnOfN1Z0r13bmkLYjrhJhdOvlx5lKOt6ZNDySevKfy
                        ZQYy6RrfmLRLdJfWF2l50TW+LY+USzzPNQE5KS/2Gt+UVE7+POfk41TsxcDrHUmGW3NPfkkNmXMJ
                        x9vRJsKt2wLWIjHZ57h0XZFhbG1TsVD68mmPCnES4Vuxte3Ech00u39xo7reB7sZz0tO1rPHz6mu
                        t+GyQrP1w+5Mdb03prb8UlvP/b1p7gWTdlor8joz4fUOmNq6eU0w3nZ5rIJ5WtZgJ9X1Bpjaus5x
                        xwL3Zo1JUV2rx9KWn0sM73jL/8BK754Zd60bS1t+Y3iP6E4lM5j3jOrfkIehrcat2VRGrcj+GL1G
                        qmvFWLlTvwEWMMpUNABgBF5U12qxtOU4NAzCp6boh8bYJ8cZV4rRXp4Tt1CIdy787ZHqeiMMbTn2
                        8LGpLP01Vhdn4KyR4+zaMkxl8e9xp5FblayPy+zaMuT8mlhmJlNXx3Z+bRnZqteAS0B1scu4Mtrz
                        7NravqaLC6vrvmxdkohmdm21pxriwuriPiVr4jC7tjbmrOXSVMQvUF1cErQetvNrywq4SpOoPahb
                        wDHs1YA9lKu2zIBruLiguhh2rQWYEnBNRraniuKCHpbbSKwDOBXCt3FSmwcOFxdKxjLbtQpgFsJ3
                        iG7/qiou+AgFsw6JO8gp+rbMNqWtUfdGg5TMRyzPDrTvybWz1WZ2pBxzTZSQoGNcHBBaO8crucMS
                        Rl0UrJcd4V9JVVD61HfWSva0hHGXBZJlj3FZnqBxfYP5XU5br3HXBc6WqdRlATkB30kFuYBrtLiQ
                        ajktdUmQGVk24BovLhR2cYxxQUD20TdQKTmequLTMNm1HKAD79vFygdcU8QFsl2cUb8YOg1xdj3N
                        sCDgmiIukPn3zdgRG+CjfJ1i2XGgVW/APP0yADvi6xQLD1+fcAedWWE6YhlAW7v2FFHAdb5VFRd4
                        JpquJQCGy20LLuN+r/P2UFdcOoyk6VoCHf36tgOedFVbXNo80nQtgO4qukbzaCfm3aa6uPSYA03X
                        /Ogc18nzdmi661cSqrq4dExP0zU7N9jWXjyt2XzVxaWvSNM1Nzo2cTVcIOD6GVWuLy7dcWCafmb0
                        dAjPJgAB1+/ki/ri0pd0fW2IQkcmni0AAq4/X+UgLm26uKvSrOg2dTRcIODqZlI7iEsnWbhEdlZU
                        HsLTcIGAq5Oyh7i06XIdjichD7u16wMCrn4owENc+qLMRszInJlGEHCJ8XEXcSnTxZB+PtqEKakN
                        mMEnJ1m5iEsv9GVIPxs6O+8WlKB9HOTcCx9xqc4wl2rMhmpwv3lcYLOAILzzEZeeNcgs/UzoJJeb
                        1wCz9EMj4iQuFegxSz8TKg80cKfIckDAFS3IcRLXJr4xU10zobyiVzgPAq54BYiXuFT+g35xFnRf
                        0Wt2Mwi4YgfsJS61TRP94iyoOMhr6SgIuFQ200tcyjzTL86CyqA6zUDdlqwuchOXCizpF+dgppE3
                        EHCBJapu4lJdYuZRZ0BNE3TyiiDgArGdm7iUX2QedQZUP8rHK4JNddGN/MQVX5njizOgvJWLVwSb
                        6sKQ2k9cqgTcI9UdlYhweaPBKQZ4TxA/cak5a9zF0h01MOKSQdVT9I1dfB3FFQd9TEa4o1rToxcF
                        Ai4jiekorvg1chvkIn80Xm0pAAGX1VdzFJcKABh0eRPXuMNsGxBwmbv4OopLdV0YdDmjjIrD9PLi
                        gGvjK6446cKgyxkVDdXf8Lg84Nr4iisOupjpcubo1pR/DNsP3lNcKujiCjNf4jikesgF9nhLHZvg
                        KS6V6eLwoi9xS1bPcuk9b5PnVLmKKzbTXL7oiorna7/MQCyXgd+vV5g4+mNE74rKz1cOQwYfwOMq
                        rrg0jOhdOfi15BcDA66Ns7g2vk9LQuIUVOV4fmDAtfEWVxzR86ApT+LWrxvPgy1HcusifMXVDCwN
                        mULckFVHRMCWI9npn77iiq/O7qIncUPW9BPPwQHXxltc8fojdhcdUZ25mp1FsAI2Pw/BV1zx8/JM
                        dUd2jg05IuDaeIsrHgDilC5H4qasuPAnu+VIWYnqimvjeW0SEjdlPTexHRNwbdzFFbtqzhf0Ix5s
                        q5aJaEcFXBt3ccW5CCa6/IjrulrXPLfHm4mzuI4U12zE4qqV5hoZcG3cxcVE13zEzqvSi5zZVDcF
                        xfUxvFzEBRZkFEfOzuJ6UFyzMVYCafSCjHJ/6yyuOLHHFL0fLu0IFmSUt+HM4mKK3g+PdgQrYEsD
                        rg3F9UE4tOOUgGvjLq4nxTUXT4d21PMDByU4nMW1objmwmHcGohjUANSXJ9CfXGBBRnDDkCjuD6F
                        6uICCzIG5s5mFlfdixNBdXGBI8kGpikprk+htrjA/MChfofi+hjqVjVYkHEeOm96ZnF5HRZCKosL
                        DFcP3x2AAf3HULMd0RmwwycfUlwfQ812BPMDRzgdDv98DBXbEcwPLJvYHEJxfQy3au0IhqtHLZan
                        uD6GausV0HD1qJObKK6PoZq4wHB10UoyhbO4YufNmah+1FoMAyQxclYr59B/DHFdj1z9A7KnYy9F
                        cX0MdeoabGczenK6s7ji6f3cz9mPOL4dteIaZU8HTGwO4Yrrj6FK5wlkT8c3mrO44k4t94pwJKrr
                        MeO4YLHPhFCGu9x8DtMrG2VPJ2SPfMXlsWiAWMQxyOCdBdHc08HzbATcWfBziHtPQ2MlFMxP6oL5
                        iotHaMzJ1EQXCuYnbfLlK654qizTXJ48pgkDBfPTJndyH/rPIQ7HhwUhYJrNqHk2Al9xxQEi01yu
                        TGlJsEhxsjFwFZc6zXNsqpcUEQfkAzp6aNRncog866ll3CnclzgiLzc8sKM4etjnD1dx+W1eTRBx
                        SF4e0aOO4vThFFdxue0vTCCxpyju66GOYoUNe13FFftxzolwZmRTolGfGm7GU1yqzJWPxSUx4yah
                        oFGfgfvZYDzFFRtbxvPexEnrsqALBfNVUpKe4orHujj4402coy8Kuq5IW69DT1PAFYU8nuKKrS3j
                        eW/GJBYfrzqctLwcxaVyvszPuxN7uALndnrVQt3MUVxXrwsTk7jO82tZ9696xNbDUVzxK8EUqj+x
                        j8v3oeoZLt3CfuJSiQiGXDMQV3outVgr4vohyjX5iUuNKHBxxgzEPfScX7y/ahJFXX7iivuKzHLN
                        wdDc4vlVk8g5uYlLzT0btU8KGYhaEpPxi1W1NZu4lL3lLNRZiJMRmXf6LcWl3iBOFJyHuEEzfrFm
                        Z3E2canrcuxnHlQnPe0xjq+aRD7YS1wqUKRXnInYFqXf6uerIvFMCidx6aUk9IozoVr0OezrE7jm
                        r13jCdUsDnrFuVC2KJO8rucY1d6WPuLS65Q4CXU24hc7l+q6VMp16X1TfcSltmxlBnU+VEiSDXcv
                        x2aywG7gLlpcFXSgo8RJWw6QQahJXaeinz13u8ehjMtOAS+pxVVh8oJ24xxXnBFV/UtNpPMQ19ND
                        sKSY3Vqq30Nc2nAxyTUrKu2+kOlyEJc2XGVOn9RiX71Nx+EgLm24OE1wXvRCxGVMV31x6eW7NdZX
                        kiEcazfqOOqLSx9LxJlcc6Mjk0WS2NXFBTYR4yr+2VGz6RYJe6uLS68Np+GaH/2KLxH31hYX2FmT
                        hmsB9ADcAs1QWVxgwxQariXQpmuBeSmVxQU2taDhWgTdr5o/pq8rLhDN03Atg26K+TNCdcV1W8ET
                        kR+06ZrdMVYVF5gcxuT8UgAvMrdjrCkusLUmDddyNIu3Rk1xge0POR1iOYDpmnkUqKK4gFOcdi4R
                        mQZYejFvlFJPXGi/ae4luCRoTeKsYVc1cbVgYTjTEMsCfMnEc8im3n+kuMBGT4zmFwa98LcZG6WW
                        uNDWmlyruDRo38AZ4+BK4qp8rDupRAPaZb5gpY64ah/rTioBj1GcTV1VxAVP65t+6BWZDtxnZK4l
                        ylXEhfayoFNcB24H+xRQQ1xIW+wprgR43N1M6qqwVwQ61p09xdWwX05d03e5gdpi+nQ9NIupa7K4
                        oLbmzNSRDO15KXVNFRfU1qxjDCTHDoprBu8yUVxQW5xoszIOC6lrmriwtrjT29q4L6OuSeLCHRFO
                        4lodMMv9P3ff2HiKuPA+wCcG8+vDUpdvz2uCuLC2GMyvku15AXWNFpf1LjB7uk4sdXkag7Hiehra
                        YkdxrZjq8puLPlJcO6OkzMyvF0tdfgZhnLisI92prTVjqstrTdAYcbV3austMdV19AnrR4hra4Rb
                        HFFcPaa6fJpuuLgsl0htvQG2ujzuNlRcpkuktt4Cy+24TBweKK7Hmdp6b4z85PLiaq8vauvdwepa
                        XFw7+yh35xFQUhGoLpeN4crF1SbOq2UO4p1o59r+plhcjzO19TFc5xFXUyauZ2NLi+OJ78dxPeJq
                        Dwlpnamt90Mt2nBZH18irscpoa0T52+9I7FjdJkakRdX0iMyBfGmXNYgrkRq6wuuxXhT1iCu/Tkl
                        rTOnnb4rcRTtEtwkxXVJBVv/u0TuwPW2HMxGrwjYCf/vTxlp0SW+MwuJ62fyRZuT1onbgL8zs4gL
                        jARsN+3jeE5L63VlL/GticTlc0rx4TUGmq13J2p3n30gR4mLZuvtmUVcl+HSotn6AGYR126wtg40
                        Wx9ANFvdp+ffDpTWjUOJH0GUJRgyKeJxbM6v5ljiv05DpHXm5vIfwmmsuPrpyAWzj+8DtOW0dpLM
                        z2ukuORQc37Swr5YWg094scQ705f2kcL06LZbsC2VFrsI34Qu3HiOg79WVHQRWl9FvtR4lJJ0ezi
                        iSul9e8Ry6Rofos+vXG6X7xTWh/HmHFrsM9EPveanMZ8vnLS1gdyHC4utJY2v6YwYbpOFyYfPpJm
                        uLhQzqrApxnji+eiJCx5RyJxFQwtohkORSOSSF0NjdYHM1hc6Cj2won3u8if3vaMtD6aoeKCm8YV
                        j3Zf7lTWP8TAwBxujDNoyepufzgc9jt6w3+ASCe5oUU4AM3RQAIZJi44Xdlrf3Hy5jwHCQVOKPWZ
                        u0ren0Hj1vAYY+4RQgwGiQuN4PBsOmLxGCAuGHAxvU4sYsEkfBwMuBjME5PySREw4HLZ+pl8CPdi
                        caEMFw+aJgmiGN3eKQKtsGAwT1JEozlmzuqJnCI3WCYpShOiaEiRhw6QJIXiQssrmD0lSeL0gjF3
                        Bk3zY8BF0sTiwmkrOIeLWyyTNIcScbVoQSv3wSUZisSFhhRdDismH0WsGzRSiIL5M4N5kuOWFxdc
                        kMHhapIlLxqYPeVwNcmidpPUC3JmO6mYfBhqFo36Bgq4OFxNCsiKa8IKWPKPc8iIi8PVZDSxuOKh
                        RQ5Xk9E0aXFxuJqMJy0uOFzNDR5IGXFIFQwYcriaTCGWjkyOtpO2syH/Om1CXHA7G67cJ6WoNJdw
                        euBsVw5Xk3KUuPqhRa6uJtNQy8W63DvcHJdniZFyzAT9lquryUQscXGrJDKZOIf6N3cZdRS52IcM
                        wkjQwzOgOFxNBnGD4oLTbJg9JcOIFfSdQ4XTbJg9JQOB4kILyTj3lAwFiQtlTxnMk6HsgLg495RU
                        AYkLZSEYzJPBKHHd4XA1g3kyHL09M7JbDObJCODMBwbzpAZF4mIwT8ZQIi7uCkFGUSAuTrMh48iL
                        i9NsyEiOOW1xkSIZS5MTF+fMk7HkxMU582Q0GXFxxxEynrS4uF8zmUBSXBz1IVNIiYujPmQSKXFx
                        1IdMIiEujvqQadjiYkeRTMTM0HPUh0zFGlvkTklkMpa42FEkk9lhbbGjSCqAlpFxrQ+pAoroOT2Q
                        VOHJjiJxQ22WxOmBpBZqP3B2FEk1InWxo0hqcjn18RanNZPKPHf7wxd0iYQQQgghhBBCCCGEEEII
                        IYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEII+Zdod4dj88X1sPtX
                        jmC7HEIeO/uAsOfBAh/O0+7vzQ/XxOk9j+haO6sEz8PvxR6Je91Lz3J5HP7K9pBtffn58IgK3F7u
                        9h83z71dgPbShCf8XUx9baPq2O/MJ3r+lEfXR3v51vF9v+hhb4/TC9Ds0aO36IzNP1AFPOXFG6su
                        G1gCdChL/+ejLlx/EtWh5MG3smznvnXu3YdAwU2iAJu2O99WF/2gz749H6C8cCWfruiMmmd31egU
                        3b4yzguebdNaWjlf9aPvE9qCLRr+wHjMk3XFk3q5xR/VG3lJF0URnop2A/fQ+pFnb6eqJ7ZrW/yM
                        Z2SAzRe40a9v/8zn8A/iBPqiyvDhYatFP3rzSoBOCQ5/gM+ofiaueYpaKaXle+JvgG10K3CPm/qR
                        aDNg165WAeyXElSJ+a79X8WtXZ7g81bYyQXFdXgliMt1Sn0Zeb38N0JrAK4a1KewNqrlRX2WBF3x
                        UbSozOpH0qroRutfpYf5qxhtHVO1ER/FbIlLWPGiynAiKa64AtMy0BePdQNLkBZXGDNIExD5RWGC
                        z5sCzlbZbuYtQkt8T1wyaNCUtoC6kt+O1GWJS1qBBfulaXFFr+BQccXuAL5EGXEF6pIuNPKYwhId
                        N3lUOND9RQhIlTdo5439V9mgyUD1f/aJewB1Wa0nP5aGq6QyvMiI6xzofqi47tFXoPvPiStQlzAr
                        keUQLysKk3NF6xsnEQs/8S/Ug5yGPF7cz8l8OyiTIS7ZV1nyjN2MuELhDxVX7HpQzF9Q++fePUkz
                        EOhexOclXlH3Iro/CZsWh9thUePOb28vRFW0OgURE5nA8sqwxCWLaeV/ZiEnriDuGCgu1YKw2fPi
                        EtUvLxkYKKG6EkegfVX3JyHT+JHCynqYfxXWJR1w/RA6xty3j7hA4lMZGS56OHhWXPLtTX5R+7yL
                        +g7KdBWIS1xbWPxAROLzEq+o+73oKeOX4WoU6ofe0/bhYMnDDYk9om9Dcckky6KGKy8uGT8kv6gH
                        RPRbuwclKKn/3hcIkyObvsUfW2z1Lfo/3tCH34Rpu9jJ97/bGr+wCKol+21R0VBcstoXNVxB+PpD
                        XB/C2gjJNTHAGWnzgDyWENfvpW4v+4dPXLJL+h4xwFn1fxSxftQ2YfwUdxfBtaIX53z9vuBuH9XM
                        CV+m+WmQY/RtIWokLllDyxouWLx9UInC+sMPTcDI0gl8bQdKsLvGcXBnuoTyhMcWgijwiijKhlUS
                        Xqs1f/JF36i96sI+qRhQC6s4uA+o5Gfwwp9hUbvP1mO4DK8tH12of5i40MgSGKNH4vq/IaMMemeP
                        hF8UUu0LXOIVOzt3QvcWBQofM3bgW+OvnWkJezRB3BBUcWBt4d2P+L6g9eSLs7DhKujMiiYcJq5O
                        HukUFBbX/5+HL/ffWy8brJOq0HGJV+wMwRXdW9whDKviLmb4MKCzGAS0UUwaqEu+EbiSG3hf0Hry
                        ngsbLisNJ9+U3HNbdPVx7+sRDNRa4ope7i7ovYHPhEgKvGKnnhO+d/9h+OrHw5EH469dm8pgSYk+
                        kOoD3V1efwvvq1tvTYbLEpd0ab0VHiauXgN96KHHTGxxhW6o+6VolK72+lYs8YrdM1/xvRujRHFX
                        52789c+gSkGc9RCfvJx46YxKhrGmbj2Z/ll0niAu3g9wjsEgcfUNtxM3aRPfe8V/CtzKX1VJv/h7
                        NdGKJV6xk+IT3/uqbxr+Dr4pZ3UpaZvAzNUdvpRRyaIuGvShLuOSo4pW8X6Aw7eDxNVfWVajDgMS
                        4mplcyK/+NtkohULvGJ3w8a4994o7itmA//atb2oQ9RNDoYAW3CXoJJlxsZuvVUZLlNc4u0dKa5G
                        1EXqhwlxBXXVOSE90tO3UolX7OLJi3Fv8ekef/zLFv6181rim7C+8Kwr40fCYCfEZQ1gLIMlrsOA
                        58bI6d03UDGgzfRFhOnqdPOMPxP5p4Ia7b79fxhkpEH6T2UHRI9mPeBf/wQpxfhMliSoUKuSS8SV
                        veW8uImrj4MegR1UX0yKS0ZdnZ24RWUTrV7gFbtvH8179+FTY5RF18IhLFP4/RsuCrQzU8TVoAsu
                        h5u4euf1DJpfjV0nxQVnBwq/+G1Z+rxJiVe8iZIY9+7b6AQ//UN2F/secas+sapLvHO9YCaIS3ZP
                        V2C4/MTVtfhX+wiNqLHrpLhgD1xc7dsk9L6z4HV9ynIZ98aVooc8b+ivJ/B9I5spEz65Soa+Pyro
                        EX1nQQp6i/2HQ8R1Ch6zdzRqwmBaXPDlDqe5i/e1wCt2F9zb9xaGVsiiKwf8kS6mUI4xj13a5Vwl
                        w0GpsPXg4MWSFEzxBxWYF1f/oN+mqncRynOlxSVe7t5FCb94kf8r8Yrdg7X2vcXHvVw7DR/R3Jr+
                        eQ/x941ERFihvYqNShbP3Bv/sPXWZrgsccGO7xBx9aLYRreJ36m0uODLHY7+9cItqNKH+KF9b/Sg
                        3S8PfSP20uuvdFGf2OMwyHMalQwnAgWtJ0d+VmG4LHEJb5QfmUBcw8uKmo5z1WlxbWCNBYmt/hsF
                        XvEefNe6d2+3ey/e1dQDzWfuP/uzZsLUmLUlPGxXdvwzMC4Rt946VllLsLjkS5AdU4V0zd/EP43N
                        S0ZccKhANNy2dz+m9xEPFn7XundvJhr92bb/Vf8sV3Whkra+gu/gn4lvim6EbD3RZueV7KGTn+Iv
                        CioUsgsxG/Gvhm6obr7JiAu6A9n77IWGtwsI2Iffte6NaqV7AnH3Xnpdjd3ANUyLigQIxSWzo1f4
                        +8F7ZcwAqsZgnxXZu3uZxI/TV8ZvxYo3r7W++gLlkwUUDrXX6r1XX8F+Lt3vnsl7i25E54uFesCv
                        OrPR1VdqcS14uKS4grltW/h7OTNkJYYLiesSjP7LEMkWl70I6/dB7Sx6ubiEgsX2Ll29F3jFbVRe
                        696ip/cnjM5c3dHsmo0uZIm4kLXRHz2DeajGoMEKDVcwk+OHUDXG2gFFdNkm/r1wZJH3yohLGBFR
                        aWjnpwKv2NnPS+be/edqpPAg+/y7+K+9kERFmn031KMUdf/TINFMH/m2yxGm7l+rMVzZpWWBmSkX
                        V/d5F/Li8bpNVlzGjPa7LkKBV/wrxF/9m/fum+pPsl1FXdCM5t5udEKyphwaD4dyr4ig9mDrrcZw
                        5cQV5tOLxdW7lS7hd7e+O05ceopCgVeUY9bpe/e2qYk/2cmf/V3ooK9zsq6NH65UXMEr9NbiOoUW
                        tlhcfQ9uC24UhiDjxKX9YoFXvMelMu/dl/ZPs434ou4u3uMP0vt8gYcrFNfFKKZstMoSGU9SXOfy
                        DViMVuw/L1mwlal/K2MdydgkGLNO31v/Ifit+mvnRnuJu4grShLi1ktsbTwvKXGd4vYqFlfnEuDY
                        UehrR4or9osF72tnT/fg4uFXRf/jx852lvL7iVR38aUu7SKu2DqL1hPJittmJSTEpXbgLBaXHsXd
                        2HORR4or9osFXrFfmJG/d/+HR/jN70LE3cVn9P+osswSDROX3qRWtN6KFlqj4kWAEtrPHb4svVUR
                        1SHSqIFFHCmu2C/mvWLXy7iji0dfbqK7hlYv7i7210ELLV5mkQaJ66hTDHI+gPjmfbMObHGBKQav
                        wi/3b5GoD+HHggmDY8UV+sUCr9iVCs1liO/dvwr38P+78HfHsBbhDgMvs0jo4cw6BjvKyxS4TFCu
                        Y1JEyi2mNhpuokMewpdKz8rcBGFMcOVRGfpN7BfzXrEb2BVe2b5339/9MSld07Xhs/z89Rr+N/xF
                        Ys/bQeIC6pLiktNaC2KEOUgF9CphkvhT0IxYRX3iJzAz5eKKHHXgF/NesbN0ouaLVnt//z9SZvTX
                        TkiiXqaPLSpOyX3o5UqpdSTpk6mI2LoWiqt/hwL/d8cXHi0u6ReHeEVxc/vebVTYv//8mqaou9i5
                        QJEFcBBXqrcYLvDeb9ZAvH4kMAexYywUl5449004ObljzHyub6RfLPADfwKQfY/EvU/BbXfRjaJd
                        R9ADDxSXMVmwvQTbsTzN34eT8NaRSFWzIo6JZykUl+hpScSVpRbKxRXbevEiDMigFgq7v++XFeis
                        5O+D9y/KIbgMLrhpR5AA40oONvuxk6hR060ikaqn3BztZykU1ytLofWILpYve4LuNg8xx1HuCrEL
                        D+LrL36V/9vFhf6qok56N1y6kmnO3euhfhaoK3WCxoo2rDQbSDzx2RpbTImrZAfdFn4dXCy1hmaQ
                        uB4FpTrBzEkj6+RXf23w164gd1w6c+GIuHeikmWFhkYwqoHV7BFuN5B8ltC6lokrdx5J9OhpcYmo
                        Xb2Mg8SV3bY6eqzwPIxTfKNgw6Q7+D3cRywC7kENSiNEkzyeRb5Aa1hclpwtbk+5SYkLTLUqa8UX
                        uBhehmSXveRBbfCc7o3qLEbdxa7CpLkQz2Wtp4Srz0AlyX6xNeXm+/9yXuEKEqmogeSzGPvvp8SV
                        P5AkeJfT4hLVpcLi+uKSJkYufe3K2NmDoLsIG1Ru3NBmy5TeiMQ6PjGuAfmQK0ikwgUaoojGTNSE
                        uMABAoD++8Ubkagowldc8jjifkHs319ld/GJi2HVYg/sUKJKFp2swC/GNSBbbgWJVNhAwrEZB0sl
                        xKXniCJ6pRRvoVRW9oIHLROXHJzuF8TqUh/lVoUSYXSxFZFSSO/2IoOpFpbxtwZkV3/5RCpsILzX
                        e6G4So5Skk9euvmbjop9xdU36FFPYQ26i/0GvsEdzTD8D/kaZipZ+EVjgcbPB9JtLJ9IhQ1knIFS
                        Jq7kWcUdJdNewurXt/QV11Z8etP3Ed3FYOMcfEcYXQsHkdtw19hjRNeAzEYsnkjNbkUlK6xEXGjR
                        F6DvQKXEJYWqEze+4hJP2/1TaEB0F7t/hkWUvgzVl3yFcxtyiLdMdj3TW4UvnkjFDXTFJSwRV0my
                        8rtJ/n5QuFU46M6Py9CnCCLMXj7db0WqQnQXOyMWhtC56NqYOwor2fAloAbS7+O84AYyAsgScfWV
                        fjsoxJN3NtsWV9DvBEnBQeIqsqiBX+sbv7uReOy9/msc5MitCHWFBUcgiM/xb27w48zxLEsnUo0G
                        EiUcuMtNXwugt4JOOS88ngW8hYPEVeIXgyN+xQ/QjBqRwf/7R+yGrualw4oqOFiqYJebX4KXaOFE
                        qtFAeFvgEnEl5SAiguzyrlBbqOszTFyIZE8VOFLxSMASHlIXuEWOMehUZ47E21i+JHck3sLrY40G
                        Eh8PO7WsfJ/ANvmLNjI0KGnjLC59yHrwJT0QoXpnwVfCxVSBtkryPfA+qAYyJw7NidFAsoSDDpbq
                        rwf7KmBTOXiY5zFqOlhLzuLS8glEoHcOV5PKwpTfTewvFo6/Gio6GLczd3PWBVs2G1FwsBQamWh0
                        sN5GTwaz0qJS//6ujyEGmbLDkLKXkxaXkk9mExB1gXgkrLl8BUHtI351SgZw5frXdA0MnP7tiNVA
                        MMH3SvFTFX21wZcGzEMpyRGc2iFlL6d4RgZobTXMBdLwZeenh50643bQl+AakC9nwTaxflgNJCdl
                        dS2brKImqgLYU5FKAh9ZPAaVvZy0uNTENGu95Q/35PVtCmdkCmvXOQVcA9KmLppItRoInouSrqOw
                        PYw5TOIHasawyXFY2ctJi0uVLOz/xn9FrrvEdEW/s/6AfImxXbK8esGuZW6YDYROhUxX0tc3+hDW
                        WFIuavtgNKHilp8ONfLp0+JS2YawHHFoiPLhBfOPYm9qiQsdpVhwiPSSiVSzgUQBOyOUF1df4cVn
                        KWXFdbZSgd7iiuUTGePYKsFiZlO3Z3srobAKkS8xaiCo0gUTqWYDoVOus+JSOw8pxGXPoCZKaj9f
                        9mLKl7WJtwHcPlGG2yuN6vdY4kK+xKoBedMFp3WZDdSC8mXFJaRTcJbSj2oy4rrZb567uCL5RMmV
                        qLtohM5teta3bnpTXMKXnHQBzaItuFuX3UDgpMn0VK3gauYjqbHrtLiuiRyzu7gi+ezNHwPpdWxT
                        6gLBg/lH6UuemRo46+8ugN1AYNpNsu/z9TYVnPGkjrh8Jq55S04acRdXVLT0RotmRulpe0aUCzTF
                        BWZFmzVw0N9dADH0b1c8sMKaLwX2ltscd9DnLZn2sMlkAO2yl5I7NygomrpJ+K7ZJra94ue7wWjS
                        lp4+4+xiFe55Vt9dgKc859x6lr+0QptakvjlNLrmtkdMhTX41c4Oqet832fNeaLspZzSVwgyCUrq
                        gcNLjuLtgM0/G/3p7gVVvWThF7e5GhAJxwW7i8/D93jeUVdO+/OX5i62dtsdLPbfX9r//OSaeKDt
                        9XcIsb/jJbrWY1c2mm+XvZTfZ7xbV9j+PlDTHICZee7vib+GF4rGE28X8xEvPxcFL9fj+Fu9nc6f
                        e6v8u9+i5d9R8gFs93+v1eGx/JpCQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBC
                        CCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQggh
                        hBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQ
                        QgghhBBCSMB/zINED9eb+K4AAAAldEVYdGRhdGU6Y3JlYXRlADIwMjItMDYtMDhUMTc6MTg6MjUr
                        MDM6MDD8jsQAAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIyLTA2LTA4VDE3OjE4OjI1KzAzOjAwjdN8
                        vAAAAABJRU5ErkJggg==" />
                        </svg>
                    </div>
                </div>
        </div>
    </body>
</html>
