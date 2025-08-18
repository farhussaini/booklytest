import { ref } from 'vue'

export function useScrollNavigation() {
  const isScrolling = ref(false)

  const scrollToTop = () => {
    isScrolling.value = true
    window.scrollTo({ 
      top: 0, 
      behavior: 'smooth' 
    })
    
    setTimeout(() => {
      isScrolling.value = false
    }, 1000)
  }

  const scrollToSection = (sectionId: string) => {
    const element = document.getElementById(sectionId)
    if (element) {
      isScrolling.value = true
      const headerHeight = 80
      const targetPosition = element.offsetTop - headerHeight
      
      window.scrollTo({ 
        top: targetPosition, 
        behavior: 'smooth' 
      })
      
      setTimeout(() => {
        isScrolling.value = false
      }, 1000)
    }
  }

  const getCurrentSection = () => {
    const sections = ['hero', 'features', 'pricing', 'contact']
    const scrollPosition = window.scrollY + 100

    for (const sectionId of sections) {
      const element = document.getElementById(sectionId)
      if (element) {
        const { offsetTop, offsetHeight } = element
        if (scrollPosition >= offsetTop && scrollPosition < offsetTop + offsetHeight) {
          return sectionId
        }
      }
    }
    
    return 'hero'
  }

  return {
    isScrolling,
    scrollToTop,
    scrollToSection,
    getCurrentSection
  }
}
