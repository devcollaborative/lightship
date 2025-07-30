/**
 * @file
 * Disclosure Element component functionality.
 */

class DisclosureElement {
  constructor(element) {
    this.element = element;
    this.button = this.element.querySelector('.disclosure-element__button');
    this.content = this.element.querySelector('.disclosure-element__content');

    // if (this.button === null) {
    //   throw new Error(
    //     `Disclosure Element #${this.element.id} missing Button.`,
    //   );
    // }

    // if (this.content === null) {
    //   throw new Error(
    //     `Disclosure Element #${this.element.id} missing Content.`,
    //   );
    // }

    // if (this.content.id === null) {
    //   throw new Error(
    //     `Disclosure Element #${this.element.id} Content missing ID.`,
    //   );
    // }
  }

  init() {
    this.button.setAttribute('aria-controls', this.content.id);
    this.button.addEventListener('click', this.toggle.bind(this));

    // If this is a popover disclosure, listen for close behaviors.
    if (this.isPopover()) {
      // Add tabindex to ensure relatedTarget is defined during focus events.
      this.element.setAttribute('tabindex', '-1');

      this.element.addEventListener('focusout', this.handleFocusOut.bind(this));
      document.addEventListener('click', this.handleClickOutside.bind(this));
      document.addEventListener('keyup', this.handleEscape.bind(this));
    }

    // If this is a hover disclosure, listen for pointer events.
    if (this.isHover()) {
      this.element.addEventListener('pointerover', this.open.bind(this));
      this.element.addEventListener('pointerout', this.close.bind(this));
    }
  }

  isOpen() {
    return this.button.getAttribute('aria-expanded') === 'true';
  }

  isPopover() {
    return this.button.hasAttribute('data-popover');
  }

  isHover() {
    return this.button.hasAttribute('data-hover');
  }

  toggle() {
    return this.isOpen() ? this.close() : this.open();
  }

  open() {
    this.button.setAttribute('aria-expanded', 'true');

    if (this.isPopover()) {
      this.handleOffScreen();
    }
  }

  close() {
    this.button.setAttribute('aria-expanded', 'false');
  }

  handleOffScreen() {
    // Reset to initial state to account for screen resizing.
    this.content.classList.remove('disclosure-element__content--right');

    // Check if content is beyond the right edge of the screen.
    const screenWidth =	window.innerWidth;
    const contentRight = this.content.getBoundingClientRect().right;

    if (contentRight > screenWidth) {
      this.content.classList.add('disclosure-element__content--right');
    }
  }

  handleClickOutside(e) {
    if (!this.element.contains(e.target)) {
      this.close();
    }
  }

  handleEscape(e) {
    if (e.key === 'Escape') {
      this.close();
    }
  }

  handleFocusOut(e) {
    if (!this.element.contains(e.relatedTarget)) {
      this.close();
    }
  }
}

(function () {
  document.querySelectorAll('.disclosure-element').forEach(
    (element) => {
      const disclosureElement = new DisclosureElement(element);
      disclosureElement.init();
    },
  );
})();
