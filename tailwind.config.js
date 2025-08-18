/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        primary: '#7223D8',
        secondary: '#DD4C7B',
        'text-primary': '#082F49',
        'text-muted': '#7A7A7A',
        'purple-light': '#F2E8FF',
        'purple-lighter': '#FCFAFF',
        'purple-gradient-start': '#7223D8',
        'purple-gradient-end': '#DD4C7B',
      },
      fontFamily: {
        'arabic': ['Inter', 'Arabic UI Text', 'system-ui', 'sans-serif'],
        'post-no-bills': ['Post No Bills Jaffna SemiBold', 'Inter', 'sans-serif'],
        'instrument': ['Instrument Sans', 'Inter', 'sans-serif'],
      },
      backgroundImage: {
        'gradient-primary': 'linear-gradient(275deg, #DD4C7B -0.05%, #7223D8 100%)',
        'gradient-text': 'linear-gradient(90deg, #7223D8 18.8%, #DD4C7B 80.34%)',
        'gradient-button': 'linear-gradient(94deg, #7223D8 0.35%, #DD4C7B 98.42%)',
        'wave-gradient': 'linear-gradient(180deg, #EEE0FF 13.64%, rgba(255, 231, 239, 0.97) 35.07%, rgba(244, 244, 244, 0.00) 81.03%)',
      },
      blur: {
        '40': '40px',
        '50': '50px',
      }
    },
  },
  plugins: [],
}
