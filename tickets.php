<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTicket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="styles/tickets.css">
</head>
<body class="bg-slate-900">
    <main>
        <div class="ticket-container bg-slate-500">
            <div class="leftside bg-slate-800">

                <!-- Personal User Card -->
                <div class="personal-user-card bg-slate-700">
                    <img class="user-pfp ml-5" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAsJCQcJCQcJCQkJCwkJCQkJCQsJCwsMCwsLDA0QDBEODQ4MEhkSJRodJR0ZHxwpKRYlNzU2GioyPi0pMBk7IRP/2wBDAQcICAsJCxULCxUsHRkdLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCz/wAARCAC3APQDASIAAhEBAxEB/8QAGwAAAQUBAQAAAAAAAAAAAAAAAQACAwQFBgf/xAA9EAACAgEDAwIEAwYDBwUBAAABAgADEQQSIQUxQRNRImFxgQYykSNCobHR8BRSwRUzcoKi4fEHJDRTYpL/xAAZAQEAAwEBAAAAAAAAAAAAAAAAAQIEBQP/xAAlEQEAAgICAgEEAwEAAAAAAAAAAQIDEQQSITFBEyIyURRCcWH/2gAMAwEAAhEDEQA/AOsycnvECfnGnzCJIeCfnCCY2ESQ7JjgTx3jYR4gPBPzjgT7mMEcJIcCeOTHgmRxwgPBPvKHVet9L6NWG1l4N7oz6fS1km67HsBnA85P2zMz8RfiA9MWrS6K2o652sbUEbHbSUohOSG+HcxxjPbHbmed26nU6mxtRqypssbaGufdba5+DdYXJbI48f1kTKdOl1H41/EFlqmgaXT1FbUVKUW2wk/vBrctlfHH2PjmL9brb7m1j36iy82VXPZq2tU+owBHqBQeeAMfIdpB6Iayyy2y5ram+JU5VnBwFUjn3z9ZZq9O2tiKWG42Da7A1rvO7IGcnwO3t96TZMVV29T9o28sDyQW3JvJzye+TNKr8TfinR7q6Oq2hBaLESxa7VbcQXDG0Ej3xiZ52JaKUstBCsWO39jvOR+/kbu3OPB+zWotb0rLVygsbB3bWcY3kk9jjBwMCNnXb0LpH450+oVK+qUtTaNqNqNMrtQzEnDMjfGM9+AZ2CWLZXXbW4eq1Q9bocq6nnKkTwq3T/FYlKWvuaoabe21lXJO0qTj3mp0TrvVOkW2WUOLKi2NTprgyrkZ/cz8OPl7ydwiavZMn5wc+5mJ0H8R6Lro1CVIatRpgjW1ltylHOA6MQMjx2m3LKlk+5iJPuYoDICyfcxZPuYIpIOT84CT7mKIwksn3MGW9zFAYCyfnBlveKCQhIpOO5ijV7RQMz3hBgPmIQk4R0aI4QCI4Rojh4gOEMA9oZIcJjfiPrS9H0iis/8Au9UGWjGD6SLgNaR/Bfn9JsgdhPLvxFdquq/iG/T1j8jLSo4xXVWMZyCc+/3lZnUbWrG51DCd1syz2NusZy7Pkl9xLEnz/wCIkQ/C4BAAyzuPBPYGdto+idMppSs1q74G+xxlifMvL0bSNgrwpIyMeB4EwTy434b44c68uLrTV7V2jIbIBJwoBU8HAz7eZdTpGpeuyxa0sYgYI3AopIJ2geZ2a9K0ZUVnPg9wDx5Bl7S9M0VGWLOc4yMjBx28RGfstPH6vP6ejai6xVsVtij8y8EN2Cn+/wCfL9b0vUojGujcFtP5iDtHJVSBz9T856N6OkzlawOc/X6yrfpKWLE9jjA7dvpKWzStXBEPMLaNSKAbFcOFJbYgwOeMD/WVXUmtbGJJcFC6gLZkf/YDPR7dDpCpX0xnHgSlb0vTX0+mVUYB2lRg/WK8vXstxI14cf03qOp6frdNqqS2arUuZQAHNe4K1TnIyMcAE+Z7RVYltdVqEMliLYrA5BVhkEETxLX6N9Ha9RyUQsCD/D6z1T8J6p9Z+H+lWOcvVW2kY5BJ/wAOxrG7HnAGZ0a2i0bhzL1ms6luRQ4gllCghgIgCIwwQkIIYDAUbHQQCvaKJe0UDL94RB7wiA6EQQiA4RwjRHDxAcI6NHiOAgPXuOM8jj3nm/TUDarrGucA2X67UVqw/KESw5C/y+09IL+ktlpx+xrsu54H7NS+M/aebdK/+HR8wbCPY2H1D/OZeVbVGziV3k26CrB+80qce/HmZFTZGAecd5eqc8Y8/wCk47sL3Yg/pJVyeOZArHjP2luteAcDP856Vec+A7Z/vEgusx5+ktFCQcCUL1YZ9x2lrRqEVnaCzJGZAvBYHxJSTjDfxkDnblh38zO9WH17Srei2cbkBHnJyceJof8Ap3qSKutdOZw3o3U6uv5CxTU4X5fCp7eZW1tu8hR3wePrxIPwi7af8SLX8RTVaHV08flBR1uH24P6zrcS326lyeXXzt6ZFFFNzCEUUUAQQwQBFDGmAIoooBXtFEvaKBle8cI33hEBwjhGiOEBwjh4jRHCA4R4jRHgQItcGOg6oF/Men64D6mhxPO+nECpVB+EKMfTAxPR9Uu7R9RXGd2i1i4980PPOOkIbq6WAxvCgDnt95j5X4tvD/KW1SPyjJGe01KKzgE5HMpo+gQoHvpBA8uo7ecky0mu0DHYt9ZPBGGBHPbkcTl9Zny6vaI8NJKVIziSqCpyCCMdj3H0lFddWAMMCPceYTqkwDnnv9pO9K620yQF79/5SlcAeRKNvUVXOWwJl6r8TaHTsytuYK207fGODLeb+IV3FfMtKypizYDDI7/+ZWtRlXHnHnucSlR+JDqf9xorn5wCx2LjOM5YSy/UqmVVvrapm7My4A+RI4lbYrV9prkizI1ikMD2yeDKWgt/w/Vui6sA/BqqXLKAf2TE0WB8ntgk/abesoV6iQQRjIPeclqLa6yV2lijEjnu27IXA+02cadMnJjcPbPl7QSivVen+rp6HtKXXIpQWLs3nHO0Mc4z8penRi0W9Obatq/lARGKIyVQghggCAwwGAIIYJIcvaKIdooGT7x0b7wiA4ZjxGCOEB4jhGiSAQCMyQRoEkAgVNbrtBplejUWMHv09wCohsYK6MgZgOcTzbp7v/g9JXWWQO1yuVPO1HK4z3mv+IKLm/E192XXZpNItJBP5WUBsfoZnAWpXilAXa3UMMKQMtYxPE5+XL23X9OnhwxWItE+1m+jpC1qtrL61nKqSz2uf/yq5b+ExNVpjpHFgTVVKTlWsrsUf9Qluvp/Ws2PVqq6mtO650ZhqX4/L6qjgD2Eor0HXpZY+o6iuC4LLm7LDyCxfz57zypH7s9b/wDKruh6lapC+oWycjn3msdbaRlmb7dpj6DpLq+7ctxZtqMqsAc/U449/wCmZ3fTejUikesis5HPHb5TwvEdtQ967iNy4jWaqxjyTgHjBmaLA9hYCr4Tmyy99ta57DySfkBO26l0JFtZkX4W4I4mL/sQaO06oabU2thwGRmIRHUoVVV8YyD9ZbHavqUXrM+YQafrHTKlCr1HTG4Eja+j1SVZwePV3Z/6PEs1dZ02rb0rhWBwA9Vgtqb/AJgM/qJBptL0Sgha+kMWBJO+qyx9x7/7wn/Sb+j6Xp70L3dNWpTyNyVox/8A4OZN/p/ESrWL/wBkemKMpqHKYJX2x7CYml0lKdV1N2pANejeu2oeTY2SpI+WMj/tOq/w1FWEqTaJh6vT79bYinBu0+5+fiJpOMD7Hj6StL+JRaI3G0fUtNqr1q6gHb1sBkIJzXtyQFPtPRdFcdTo9Fee9tFTt/xFef4zz3RtqUfUaPUNZbWEb02s5+FVyMmd10ZSvS+ngjGKuM+24zRw5ntMPHnR9kSvxRRGdJygMBhgMAQQmNgKCGCA5e0UC9vvFAyveERueTCJIeJIBIxJUgPUSUCNWSASAQI6IQ4gcj+J81a/TXKPjs0FmPmamOJmdNousp0r4yWrWxyx7F/i58+Z034l0L6vQrdTkXaNmsUjkhDjJx5A8j2JmP0q5StanbnYpOOBuwM4nL5NZraZ/br8a3bHEfpNb0MajDNqb1yB8KlQv2GJFT+HOm0v6lnqXMDn9u2UH/KOJrW6qulckjge8yreqNc/poQF/eI74+UyRv02R5XESlbkCqPh4UADAm/pc7QMduTMknS0V12krtUbmPzAj6uu6KoAqytuHI54lqeJ3Ktom0eFrVrubA7H3kdZRBh8DxzIa+raLV2EDbnd3zjHykfU9Vp9taVMm5mH7w/KOWMj53B8alpKlB5AUn3wJIVrORkZx7TjG62+ktCsxNZPk/ymknWqXUNvHb35l5nwrrTR1FaqcjAPuRwZyPVLjV1bo7Ald7XoyjyShAH8pr6jqi8ncDnsBz3nK9W1NlvUelKi77EcOq8cndkdyB445/nLYazNtPLLOo3/AI6nXUMhrpoQ5urQaq4fnWofCaqwP3nOFz8512mqNOn01RxurqVWx2DYyQPvMLpu7VazTsNPqVq0677W1FNlQVwp2qPUHJyc8e369HNfEx9Ym0sfMydpisBEYojNzCEBhgMAGCEwQBGx0aYDl7feKFe33igY/vCO8b7xwMkOHeSqcSId48QLSEGSiVkPaWFMgPEdGwiASAQwPZgyn6MMGeW+vqOn36rSsQLdLc9RAOQy/mQn6jBx4+09S7zyz8XZo67Y5LbdTUg+JQq5QAZQrwQP9J45qdqtHHv1t/qLVdVuat2ssYKgwAPc84Ef09kZS9tuHIyVB/KD9Zj6hBbp7yCCyqGXnypyf1mSmtspcvZ6jIcDapG3txMtcMWhuvmmsw6TqHUWw1S63UbBnArIAIHOMkShVrLSNoZ1A5/aEscZ9zLeiV+oUjUU6LdWhsG+zdt3oBuX4FPxAY8+Zd0/TupahHs0uk09iqR6u0b/AE2xu2EsvcSJitY09I7Wne2D/iba7GKPaSc7m9R8DvyBmb3QdRS9l1usWxlrRSpd2b4SxBb38SZeidTt0ja0Uab0aicAAgsp4LYAycf32jaOldUfTW31XV1U2XV6YMAawTZlTjJzgc5MiZrMIitone03VX6VbXw4UuSEx2yMzC6fqbS99GSbK8kc91HEg6jpur2amzQ6YjUV0u37YcoAOMiwcY4EZ0qh6brLXPxIrVYzwd3k/pLxSsUec5Ld4aj3srVgnO5h+b6E8ypXe1vVem2KCzLqNOUGexyCNuR4jdXYDYXUg7Aypt7HspOf7/jGdNHqdb6Ui9jqdNkqcuE4yR856YKanbx5F9xp7igCoijsqgDJJP6mOjVxtGM4xx9I6a2AIIYIAiMURgAxsJigCNMMEBy9vvFEvb7xQMbyY4GMzyY4SQ8R4jB4jxAkWTo3aVxJFMCyDHSNTHyA6cX+POmPqdHXr6UX1NIc2Pn4jURjaBjsOSfr+vZxroliNW6hkYEMrDKsDxgiB4bpdUNhyFyyhSDz9O0tdJ0en1NmoW1VatlIKHzz+b6+0Z+Juk29F6pfUgYae5mv0zDBArLEgZUAZH+ki6VrWpvqJ/eIVj8u+PvPC9NROmvHkiZjs63pVL9KD1ae9loe43GtxuXcU9MjPcAjv9J0PR7ToU1JLaWw6rWNrWZGNYDlUr27cngBRMJWW5AynhhnMo6nS6pnHpWsBjOABnP1mDcTPl0+tZj07anUaWjSf4N7dOla1WVZr8K5btknnmZgPTUoGmpNt6q7v6mqsNrlmYsTk/Xic1VpNS77bLbewPJ4+wm7pNN6aIu0lh3JGMxadRqCtax5iE/pU1UvZtVVwT2H+k4W9qqNZqzXzWrWMwPPJG45P1nVdae9NK+MqMNtIJ5OccfrOB1Nzu2RgPYxLBQRuUDHk4nrgp23LNnyddAbSAwblmfdz22/OdF+AqG1XXV1Br3VaWiwOxBISxx8HI895yNlhZhjGORjE778BW09NtdNSAg6katljHb6dlYITf8AJskfXHvNsar7c+d39PTh2hgIIJBGD7GGejyKCGNgKKKCADBCYIAgMMBgEdooh2igYvmOEZ5McJIkWPEjEeIEgj1kYjwe0CwviSCQKZMOZAdDILdRRQCbH5HZE+Kw/RRMyzrFxJWmlU74a0/2ISr/AIt6OnVOk3haVOooPr0uB8Xwq2UGBkk9gPeeODNdiAn4gRznjIPI/nPT9bZrL3Y36lnUrlgAwUDx+WcL13p66W9baiWF2bmwWJDN3yPc8n7x7G/0LXVPWtNh5IYrjnJLduZ0VbaZ92ANyD4hxxg8jM8s02us07IyNhgTjjjOfYzUr65YMgMR8AGc9j5MxZOPudw34uTERqXpgt0VOwnYx4U4ALc5I7RWa7Sol7/CPSAZgcAlcA/XyJ5vb19g1WC3wGsk5BDAc47yvqOuai3kvg8tgDILAYAx8pWOPM+17cmvw6D8QdXXWqU04IrFYLjAyXV+MjPznEWWBnJBycucnjjOYbdU9hGWHgZ5GQCTmT6PSG0+oR8HJ5B5Pt/f/jVFYxVYpmcttJun6IapzZYD6QYHjyc9vp7zqUT/AHQHHt+kp6asKqj9fnNJF+Kr5Hn9JgyZZtZ08WKKVaml6r1vp6M+nLayitHtfQ3sWLIi7nGksHxh8ZYDkHGMAmdb0rrHTusaeu/RuTuQO1b4Dr4PHkA8E/ynL6FR6insa0ts/RCP45xKKINO4ahvRZbHZXrJVgzMWOCvPPmbOJecsali5eOtJ3D0WCZHR+qNrFso1BU30qrCzGPVUkjLeM/39deabR1nUsZQQwSAIITBAUaYYDAK9ool7RQMPyY8SMHkx4kiQRwjBHAwJBHdpGWCjJ+X3PYCCywgcMMDPAHJ+5kTKUjWWLnBrHfHO4/p2kFt9gBzZZ7kAlBjt4EgNvfaiseRlW5+pzImBO7L7gv5gc5B8DBxI2aD1eGyCoOQdnDfLJMpXYtDYPC/5lYfF/KOuvZdoZDjPBcEAH6jMgsJdCwPOAzbQGGfkRzISiLsVCKCDnn0+Bx8hMTrRZndSy43VL4DHCt/ZmvWQN3wuzcd1QfM4zMTrCn1clWAbHkEYz44+cmvslzFmiay/VCgZNJr3KM8h1z3lBktQngggnx7zc6a5/2h1VT+8q4z7I20fzmk+lpdXyi4Yc/Dx/WeOTL0tMS0UwfUrEw5DLfxz9TCEtfOFY89wD2+eJ0TaPThvhRQAB4Bjq9Oob4VAz/lHt9JX+RCY40/MsrTdMus2s/AJ7H2E3qKlrVUUAAYwAB5+snrQBRnuB/YkgC8dpkyZZv7bcWGKeklY7D5S9VtyPlKSECSWXrUu4nv2+szS0tmi80V6y4Eg7EorwcZew5II8jA7f0lP1E2Bjt2g9+4yPJMro9z11BkLFDYcHjG/GSxPsAP7ENSanUahNOrg+vYqYqHwqmfiY5JPA5nd4uP6ePc+3F5OTvknXp0/SlNdJ1WxT6rEDBJIVfhHwj9fvNVNZlyM4H2IH/EO8r1enTWlFZYGtAirZyMIMA4Ax/CPaxCUNgq3rjKlwgIIPLZBiZ7Tt4tCu+t/wB5cj27SUzHRkIVkGxgeRzhvBAz/SW0tAGQ2CMZUnkfPB5xIQuQGR12q/BG1vIMkkgQQ5jYDl7RRL2igYHkx6mR+TJBJEgjhGCOBGee3mBDfa6vQF8Ox8clVyO8ZgOUZ3TcBkqwAODKVlnqOrbl7WA7scHnjmE31oAQpB7Eg7yw7ZGJSVoS6iwIPCAMCCjKSM+Tk9pAtlrBsHJPdc7WYds4yB/CMd7S64OdwwAwOT5AORJCbCMl2JAyFdVxz/fvArPklgwKgcrzwPpk45+saVfaea1PcBcBiPA4OJLuJDeoCqDAJZcrn+OJXLKuUDIQ2OUwy+/7pJ/hAhLJvCl8cDORxnyM4MzOpJVk+mMn5Y44xNNsjuoLHAOAoZvPnxMvqA9M+oBgngggHnvmI9jl9DYF6nqT2DixfHuDN4WFdvPE5hw1GstYfu2bh/wmbKXBkByCMZ/7zLnj7tt3Hn7dLxNTfEDgAeDj+UgNyAjHvmU2P+ViPkDEhmfq09mh6xIH1jxYR3OfMqK2BkyGzVKnY5JlOu1+2vMtX11Xlj2kdbtqbPUI/ZocKO4Zh/SZ1Za3L2NtQAlj7YGcCXHew07aGKhAhGBjcvfOTzjmbeNxtz2t6ZORyNR1q0LLN62VNaFZQr1oCcNjJ2tg9z9J0HQNHcPV1jV7d5CIcAJgkE8cfLz/AEnOdJ0d+vuryu1EHNgHgcZJJz9J3AoRK60TYoQBAPi3YHzx+s33t8Q5sQtH00Hd1clu1tuM+/w5Mira/bYXtYrkgZV2yf8AmEcmmdGLuwBwMF3VR8sgH/WQ6jqaVD00tD2EDhPjGO3cTxWW6QoLPYUBYbssjZA7eMyQ2JYwVMWfMVnAPtzzKFYvtbfqF5BO1VJ2qOP3RgS4prRdoAUYzgKfJJ52QHAWVkGxW2DsccgH2+UsV3EgZIK44I8/OViinkPnA+ff2zGlLKySQTXjJweVz5AgaOQRxATK6WEfl+LgHA8qezScMGGR7dpKD17feKBe33igYWDmOUGKKSJADE+5a7W/y1u36KTFFA55bCtjEqCot5zzjesn2C4CxQQNwbjaq4zjt3/jFFKLC/qIrMigMhUhw5yvOMjzA5vUE2My5UYbIOQeedv9IooEKnac1hctjk5BB+q/0kC7rLQAtRYE7zgo4ySeCvBiigROSzlU3M4LAG0hlz9DKfU0HoKLFCsONyY/MfcCKKIHL6ioMWOBuUd/cAciRaZyG9I9mzs+vtFFIz1jW3vglO2VJwe0Skse/eKKYvht+dHXsyIMfrINNp3vZnZsImWY9+ByeIopfH50pl8bStqWffXUAiJWNgIBPGCSc+ff+8aHStDruqX1pWcq4Bt3vhcL5I7/AGiinRtOo8OZ7ny9D0PTjotPWKq6yNoZj+XdjyRzLLW2qjF6lIGCuDyQwyO2Iop5LKJ1Nupb0qq3DEkElq9oI45BBlijSjTrbYy2NZtDtaXUPt4HwKBtH6RRQhOQzKrlXCkDb+0JHPfIGP5RJWG5Kv8AEw2ksCpA9gT/ADiiki2tdoVQFOBlQcqACD7d5I1dgXe2AB5B5wYopAhC7CLEOayASp8ZPJWEaiomvBYbuxxznGeYooF6vLIrYxnnEUUUlD//2Q==">
                    <div class="user-combo">
                        <p class="username text-blue-300">Dimitri</p>
                        <p class="rank text-red-500">Administrateur</p>
                    </div>
                </div>

                
                <div class="user-card bg-slate-900">
                    <img class="user-pfp ml-5" src="https://th.bing.com/th/id/OIP.3GUcZMTvbmQWkRlxfQ2wBQHaJa?w=140&h=180&c=7&r=0&o=5&pid=1.7">
                    <div class="user-combo">
                        <p class="username text-blue-300">Bilal</p>
                        <p class="rank text-gray-500">Utilisateur</p>
                    </div>
                </div>

                <div class="user-card bg-slate-900">
                    <img class="user-pfp ml-5" src="https://th.bing.com/th/id/OIP.3GUcZMTvbmQWkRlxfQ2wBQHaJa?w=140&h=180&c=7&r=0&o=5&pid=1.7">
                    <div class="user-combo">
                        <p class="username text-blue-300">Bilal</p>
                        <p class="rank text-gray-500">Utilisateur</p>
                    </div>
                </div>

                <div class="user-card bg-slate-900">
                    <img class="user-pfp ml-5" src="https://th.bing.com/th/id/OIP.3GUcZMTvbmQWkRlxfQ2wBQHaJa?w=140&h=180&c=7&r=0&o=5&pid=1.7">
                    <div class="user-combo">
                        <p class="username text-blue-300">Bilal</p>
                        <p class="rank text-gray-500">Utilisateur</p>
                    </div>
                </div>


            </div>
            
            <div class="rightside">
                <div class="topbar-info bg-slate-700">
                    <img class="user-pfp ml-5" src="https://www.instinct-animal.fr/wp-content/uploads/2019/10/ornithorynque-4.jpg">
                    <div class="user-info-container">
                        <p class="username ml-3 text-blue-300">Username12843</p>
                        <p class="user-rank ml-3 text-gray-500">Utilisateur</p>
                    </div>
                </div>
                <div class="messages-container">

                </div>
                <div class="msginput-container">
                    <input type="text" class="msginput bg-slate-600">
                    <i class="fa-regular fa-paper-plane fa-xl ml-3"></i>
                </div>
            </div>

            <div class="farright bg-slate-800">
                <div class="actions">
                    <p class="actiontitle mt-5 text-white text-2xl">Actions</p>
                    <button type="button" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Claim Ticket</button>
                    <button type="button" class="mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Close Ticket</button>
                </div>
                <div class="statusbar">
                    <p class="ticketstatus">Status: <strong>Processing</strong></p>
                    <p class="ticketclaimer">Claimed by: <strong>Dimitri</strong></p>
                </div>
            </div>
        </div>
    </main>


    

    
</body>
</html>