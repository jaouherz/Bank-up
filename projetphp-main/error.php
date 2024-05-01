<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Bouncer</title>
    <style>
        :root {
            --red: #cf352c;
            --dark-red: #9c0502;
            --light-beige: #f3f2ee;
            --beige: #eee8e0;
            --dark-beige: #dad2c9;
            --black: #1d2528;
            --gray: #38434a;
            --lighter-gray: #49555b;
            --white: #fff;
            --bouncer-skin: #ffb482;
            --pole: #f5ae4e;
            --pole-shadow: #df9d41;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Limelight", cursive;
            color: var(--gray);
        }

        .background {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            &::before {
                display: block;
                content: "";
                position: absolute;
                top: -100px;
                left: 50%;
                transform: translateX(-50%);
                width: 450px;
                height: 450px;
                background: var(--beige);
                border-radius: 50%;
                z-index: -1;
            }
            &::after {
                display: block;
                content: "";
                position: absolute;
                top: -150px;
                left: 50%;
                transform: translateX(-50%);
                width: 550px;
                height: 550px;
                background: var(--light-beige);
                border-radius: 50%;
                z-index: -2;
            }
        }

        .door {
            position: relative;
            width: 180px;
            height: 300px;
            margin: 0 auto -10px;
            background: var(--light-beige);
            border: 10px solid var(--dark-beige);
            border-radius: 3px;
            font-size: 50px;
            line-height: 3;
            text-align: center;
            text-shadow: 0 2px var(--pole);
            &::before {
                display: block;
                content: "";
                position: absolute;
                top: 140px;
                right: 10px;
                width: 25px;
                height: 25px;
                background: var(--black);
                border-radius: 50%;
            }
            &::after {
                display: block;
                content: "";
                position: absolute;
                top: 148px;
                right: 18px;
                width: 35px;
                height: 10px;
                background: var(--lighter-gray);
                border-radius: 5px;
            }
        }

        .rug {
            width: 180px;
            border-bottom: 120px solid var(--red);
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            &::before {
                display: block;
                content: "";
                position: relative;
                width: 100%;
                height: 10px;
                background: var(--dark-red);
            }
        }

        .foreground {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
        }

        .bouncer {
            position: relative;
            left: -130px;
            transition: left 1.5s;
            .head {
                position: relative;
                left: 10px;
                margin-bottom: 10px;
                width: 65px;
                height: 90px;
                background: var(--bouncer-skin);
                border-radius: 15px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    right: 0;
                    bottom: 0;
                    width: 55px;
                    height: 40px;
                    background: rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    border-top-left-radius: 30px;
                    border-bottom-right-radius: 15px;
                    z-index: 10;
                }
                .neck {
                    position: absolute;
                    bottom: -15px;
                    width: 48px;
                    height: 30px;
                    background: var(--bouncer-skin);
                    z-index: 5;
                    &::before {
                        display: block;
                        content: "";
                        position: absolute;
                        top: 15px;
                        right: 0;
                        width: 0px;
                        height: 0px;
                        border-left: 15px solid transparent;
                        border-right: 15px solid rgba(0, 0, 0, 0.3);
                        border-top: 2px solid rgba(0, 0, 0, 0.3);
                        border-bottom: 2px solid transparent;
                    }
                }
                .eye {
                    position: absolute;
                    top: 40px;
                    width: 5px;
                    height: 5px;
                    background: var(--black);
                    border-radius: 50%;
                    &.left {
                        right: 5px;
                    }
                    &.right {
                        right: 30px;
                    }
                    &::before {
                        display: block;
                        content: "";
                        position: relative;
                        bottom: 8px;
                        right: 5px;
                        width: 15px;
                        height: 5px;
                        background: rgba(0, 0, 0, 0.3);
                        border-radius: 5px;
                        transition: bottom 0.5s;
                    }
                }
                .ear {
                    position: relative;
                    top: 40px;
                    left: -10px;
                    width: 20px;
                    height: 20px;
                    background: var(--bouncer-skin);
                    border-radius: 50%;
                    &::before {
                        display: block;
                        content: "";
                        position: relative;
                        top: 5px;
                        left: 5px;
                        width: 10px;
                        height: 10px;
                        background: var(--white);
                        border-radius: 50%;
                    }
                    &::after {
                        display: block;
                        content: "";
                        position: relative;
                        top: -3px;
                        left: 10px;
                        width: 10px;
                        height: 55px;
                        border-top: 3px solid transparent;
                        border-left: 2px solid var(--white);
                        border-bottom: 3px solid transparent;
                        border-radius: 50%;
                        transform: rotate(-10deg);
                        z-index: 10;
                    }
                }
            }
            .body {
                position: relative;
                width: 110px;
                height: 270px;
                background: var(--black);
                border-top-right-radius: 45px;
                border-top-left-radius: 15px;
                &::before {
                    display: block;
                    content: "";
                    position: relative;
                    top: 5px;
                    width: 104px;
                    height: 110px;
                    background: var(--white);
                    border-top-right-radius: 42px;
                }
                &::after {
                    display: block;
                    content: "";
                    position: absolute;
                    top: 0;
                    width: 75px;
                    height: 180px;
                    background: var(--gray);
                    border-top-right-radius: 42px;
                    border-top-left-radius: 15px;
                    border-bottom-right-radius: 100px;
                    border-bottom-left-radius: 10px;
                    z-index: 15;
                }
            }
            .arm {
                position: absolute;
                top: 105px;
                left: -20px;
                width: 60px;
                height: 230px;
                background: var(--lighter-gray);
                border-radius: 30px;
                box-shadow: -1px 0px var(--black);
                transform: rotate(-30deg);
                transform-origin: top center;
                z-index: 20;
                transition: transform 1s;
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    bottom: 0;
                    width: 60px;
                    height: 60px;
                    background: var(--bouncer-skin);
                    border-radius: 50%;
                }
            }
        }

        .poles {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-25%);
            .pole {
                position: absolute;
                bottom: 0;
                width: 15px;
                height: 135px;
                background: var(--pole);
                &.left {
                    left: 200px;
                }
                &.right {
                    right: 200px;
                }
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    top: -10px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 25px;
                    height: 25px;
                    background: var(--pole);
                    border-radius: 50%;
                    box-shadow: inset 0 -2px var(--pole-shadow);
                }
                &::after {
                    display: block;
                    content: "";
                    position: absolute;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 25px;
                    height: 4px;
                    background: var(--pole);
                    border-radius: 4px;
                    box-shadow: 0 2px var(--pole-shadow);
                }
            }
            .rope {
                position: absolute;
                top: -110px;
                left: -218px;
                width: 150px;
                height: 75px;
                border: 20px solid var(--red);
                border-top: 0;
                border-bottom-left-radius: 150px;
                border-bottom-right-radius: 150px;
                box-shadow: 0 2px var(--dark-red);
                box-sizing: border-box;
                transition: width 1.5s;
            }
        }

        .hover:hover {
            .bouncer {
                left: 130px;
            }
            .arm {
                transform: rotate(-42deg);
            }
            .rope {
                width: 435px;
            }
            .eye::before {
                bottom: 4px;
            }
        }

    </style>
</head>

<body>
<div class='hover'>
    <div class='background'>
        <div class='door'>403</div>
        <div class='rug'></div>
    </div>
    <div class='foreground'>
        <div class='bouncer'>
            <div class='head'>
                <div class='neck'></div>
                <div class='eye left'></div>
                <div class='eye right'></div>
                <div class='ear'></div>
            </div>
            <div class='body'></div>
            <div class='arm'></div>
        </div>
        <div class='poles'>
            <div class='pole left'></div>
            <div class='pole right'></div>
            <div class='rope'></div>
        </div>
    </div>
</div>
</body>

</html>
