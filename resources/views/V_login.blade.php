<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page || Dasify</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/dasify.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/bootstrap.min.css') }}" />
    <link rel="shortcut icon" href="{{ asset('./assets/img/logo-lkp.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="tsparticles"></div>

    <div class="login-panel d-flex justify-content-center flex-column align-items-center">

        <div class="d-flex flex-row">
            <div class="img-panel w-50 d-flex justify-content-center align-items-center">
                <img src="{{ asset('./assets/img/logo-lkp.png') }}" alt="" width="75%">
            </div>
            <div class="form-panel w-75 p-5 text-white d-flex justify-content-center align-items-center">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="">
                        <h1>Login Account</h1>
                        <p style="transform: translateY(-10px);">Sistem Absensi Siswa</p>
                    </label>
                    <label for="email" class="w-100">Email
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control w-100" placeholder="Masukkan Email..">
                    </label>
                    @error('email')
                        <div class="text-danger my-1">{{ $message }}</div>
                    @enderror
                    <label for="password" class="w-100 mt-1">Password
                        <input type="password" id="password" name="password" class="form-control w-100" value=""
                            placeholder="Masukkan Password..">
                    </label>
                    @error('password')
                        <div class="text-danger my-1">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
                    <label for="">
                        <p class="mt-2">version 1.0. Copyright &copy;2024</p>
                    </label>
                </form>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger shadow position-absolute" style="top: 2%;right: 2%" onclick="hideElement(this)">
            {{ session('error') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
        </div>
    @endif
    <script>
        function hideElement(element) {
            element.style.display = "none";
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/3.1.0/tsparticles.bundle.min.js"
        integrity="sha512-Pv/x9J11LpAF+KsoMoLjZZbVK03G63ZDN/GhJrhu8bP5sZO3VHzQ1XbfuU/+wubUB00sNnMAIEM3l/PMVUlKjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tsParticles.load({
            id: "tsparticles",
            options: {
                autoPlay: true,
                background: {
                    color: {
                        value: "#222831"
                    },
                    image: "",
                    position: "",
                    repeat: "",
                    size: "",
                    opacity: 1,
                },
                backgroundMask: {
                    composite: "destination-out",
                    cover: {
                        color: {
                            value: "#fff"
                        },
                        opacity: 1
                    },
                    enable: false,
                },
                clear: true,
                defaultThemes: {},
                delay: 0,
                fullScreen: {
                    enable: true,
                    zIndex: 0
                },
                detectRetina: true,
                duration: 0,
                fpsLimit: 120,
                interactivity: {
                    detectsOn: "window",
                    events: {
                        onClick: {
                            enable: true,
                            mode: "push"
                        },
                        onDiv: {
                            selectors: [],
                            enable: false,
                            mode: [],
                            type: "circle"
                        },
                        onHover: {
                            enable: true,
                            mode: "grab",
                            parallax: {
                                enable: true,
                                force: 60,
                                smooth: 10
                            },
                        },
                        resize: {
                            delay: 0.5,
                            enable: true
                        },
                    },
                    modes: {
                        trail: {
                            delay: 1,
                            pauseOnStop: false,
                            quantity: 1
                        },
                        attract: {
                            distance: 200,
                            duration: 0.4,
                            easing: "ease-out-quad",
                            factor: 1,
                            maxSpeed: 50,
                            speed: 1,
                        },
                        bounce: {
                            distance: 200
                        },
                        bubble: {
                            distance: 400,
                            duration: 2,
                            mix: false,
                            opacity: 0.8,
                            size: 40,
                            divs: {
                                distance: 200,
                                duration: 0.4,
                                mix: false,
                                selectors: [],
                            },
                        },
                        connect: {
                            distance: 80,
                            links: {
                                opacity: 0.5
                            },
                            radius: 60
                        },
                        grab: {
                            distance: 400,
                            links: {
                                blink: false,
                                consent: false,
                                opacity: 1
                            },
                        },
                        push: {
                            default: true,
                            groups: [],
                            quantity: 4
                        },
                        remove: {
                            quantity: 2
                        },
                        repulse: {
                            distance: 200,
                            duration: 0.4,
                            factor: 100,
                            speed: 1,
                            maxSpeed: 50,
                            easing: "ease-out-quad",
                            divs: {
                                distance: 200,
                                duration: 0.4,
                                factor: 100,
                                speed: 1,
                                maxSpeed: 50,
                                easing: "ease-out-quad",
                                selectors: [],
                            },
                        },
                        slow: {
                            factor: 3,
                            radius: 200
                        },
                        light: {
                            area: {
                                gradient: {
                                    start: {
                                        value: "#ffffff"
                                    },
                                    stop: {
                                        value: "#000000"
                                    },
                                },
                                radius: 1000,
                            },
                            shadow: {
                                color: {
                                    value: "#000000"
                                },
                                length: 2000
                            },
                        },
                    },
                },
                manualParticles: [],
                particles: {
                    bounce: {
                        horizontal: {
                            value: 1
                        },
                        vertical: {
                            value: 1
                        }
                    },
                    collisions: {
                        absorb: {
                            speed: 2
                        },
                        bounce: {
                            horizontal: {
                                value: 1
                            },
                            vertical: {
                                value: 1
                            }
                        },
                        enable: false,
                        maxSpeed: 50,
                        mode: "bounce",
                        overlap: {
                            enable: true,
                            retries: 0
                        },
                    },
                    color: {
                        value: "#ffffff",
                        animation: {
                            h: {
                                count: 0,
                                enable: false,
                                speed: 1,
                                decay: 0,
                                delay: 0,
                                sync: true,
                                offset: 0,
                            },
                            s: {
                                count: 0,
                                enable: false,
                                speed: 1,
                                decay: 0,
                                delay: 0,
                                sync: true,
                                offset: 0,
                            },
                            l: {
                                count: 0,
                                enable: false,
                                speed: 1,
                                decay: 0,
                                delay: 0,
                                sync: true,
                                offset: 0,
                            },
                        },
                    },
                    effect: {
                        close: true,
                        fill: true,
                        options: {},
                        type: []
                    },
                    groups: {},
                    move: {
                        angle: {
                            offset: 0,
                            value: 90
                        },
                        attract: {
                            distance: 200,
                            enable: false,
                            rotate: {
                                x: 3000,
                                y: 3000
                            },
                        },
                        center: {
                            x: 50,
                            y: 50,
                            mode: "percent",
                            radius: 0
                        },
                        decay: 0,
                        distance: {},
                        direction: "none",
                        drift: 0,
                        enable: true,
                        gravity: {
                            acceleration: 9.81,
                            enable: false,
                            inverse: false,
                            maxSpeed: 50,
                        },
                        path: {
                            clamp: true,
                            delay: {
                                value: 0
                            },
                            enable: false,
                            options: {},
                        },
                        outModes: {
                            default: "out"
                        },
                        random: false,
                        size: false,
                        speed: 2,
                        spin: {
                            acceleration: 0,
                            enable: false
                        },
                        straight: false,
                        trail: {
                            enable: false,
                            length: 10,
                            fill: {}
                        },
                        vibrate: false,
                        warp: false,
                    },
                    number: {
                        density: {
                            enable: true,
                            width: 1920,
                            height: 1080
                        },
                        limit: {
                            mode: "delete",
                            value: 0
                        },
                        value: 100,
                    },
                    opacity: {
                        value: {
                            min: 0.1,
                            max: 0.5
                        },
                        animation: {
                            count: 0,
                            enable: true,
                            speed: 3,
                            decay: 0,
                            delay: 0,
                            sync: false,
                            mode: "auto",
                            startValue: "random",
                            destroy: "none",
                        },
                    },
                    reduceDuplicates: false,
                    shadow: {
                        blur: 0,
                        color: {
                            value: "#000"
                        },
                        enable: false,
                        offset: {
                            x: 0,
                            y: 0
                        },
                    },
                    shape: {
                        close: true,
                        fill: true,
                        options: {},
                        type: "circle"
                    },
                    size: {
                        value: {
                            min: 1,
                            max: 10
                        },
                        animation: {
                            count: 0,
                            enable: true,
                            speed: 20,
                            decay: 0,
                            delay: 0,
                            sync: false,
                            mode: "auto",
                            startValue: "random",
                            destroy: "none",
                        },
                    },
                    stroke: {
                        width: 0
                    },
                    zIndex: {
                        value: 0,
                        opacityRate: 1,
                        sizeRate: 1,
                        velocityRate: 1
                    },
                    destroy: {
                        bounds: {},
                        mode: "none",
                        split: {
                            count: 1,
                            factor: {
                                value: 3
                            },
                            rate: {
                                value: {
                                    min: 4,
                                    max: 9
                                }
                            },
                            sizeOffset: true,
                        },
                    },
                    roll: {
                        darken: {
                            enable: false,
                            value: 0
                        },
                        enable: false,
                        enlighten: {
                            enable: false,
                            value: 0
                        },
                        mode: "vertical",
                        speed: 25,
                    },
                    tilt: {
                        value: 0,
                        animation: {
                            enable: false,
                            speed: 0,
                            decay: 0,
                            sync: false
                        },
                        direction: "clockwise",
                        enable: false,
                    },
                    twinkle: {
                        lines: {
                            enable: false,
                            frequency: 0.05,
                            opacity: 1
                        },
                        particles: {
                            enable: false,
                            frequency: 0.05,
                            opacity: 1
                        },
                    },
                    wobble: {
                        distance: 5,
                        enable: false,
                        speed: {
                            angle: 50,
                            move: 10
                        },
                    },
                    life: {
                        count: 0,
                        delay: {
                            value: 0,
                            sync: false
                        },
                        duration: {
                            value: 0,
                            sync: false
                        },
                    },
                    rotate: {
                        value: 0,
                        animation: {
                            enable: false,
                            speed: 0,
                            decay: 0,
                            sync: false
                        },
                        direction: "clockwise",
                        path: false,
                    },
                    orbit: {
                        animation: {
                            count: 0,
                            enable: false,
                            speed: 1,
                            decay: 0,
                            delay: 0,
                            sync: false,
                        },
                        enable: false,
                        opacity: 1,
                        rotation: {
                            value: 45
                        },
                        width: 1,
                    },
                    links: {
                        blink: false,
                        color: {
                            value: "#ffffff"
                        },
                        consent: false,
                        distance: 150,
                        enable: true,
                        frequency: 1,
                        opacity: 0.4,
                        shadow: {
                            blur: 5,
                            color: {
                                value: "#000"
                            },
                            enable: false
                        },
                        triangles: {
                            enable: false,
                            frequency: 1
                        },
                        width: 1,
                        warp: false,
                    },
                    repulse: {
                        value: 0,
                        enabled: false,
                        distance: 1,
                        duration: 1,
                        factor: 1,
                        speed: 1,
                    },
                },
                pauseOnBlur: true,
                pauseOnOutsideViewport: true,
                responsive: [],
                smooth: false,
                style: {},
                themes: [],
                zLayers: 100,
                name: "Parallax",
                motion: {
                    disable: false,
                    reduce: {
                        factor: 4,
                        value: true
                    }
                },
            },
        });
    </script>
</body>

</html>
