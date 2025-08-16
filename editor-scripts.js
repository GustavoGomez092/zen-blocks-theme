	(() => {
		// Target selector for the admin editor container
		const EDITOR_SELECTOR =
			".interface-navigable-region.interface-interface-skeleton__content";
    const WIDGETS_SELECTOR = "#tabs-1-blocks-view";

		/**
		 * Add the data-lenis-prevent attribute to the editor container
		 */
		function addLenisPrevent() {
			const editorContainer = document.querySelector(EDITOR_SELECTOR);
      const widgetsContainer = document.querySelector(WIDGETS_SELECTOR);

			if (
				editorContainer &&
				!editorContainer.hasAttribute("data-lenis-prevent")
			) {
				editorContainer.setAttribute("data-lenis-prevent", "");
				console.log("✅ Added data-lenis-prevent to editor container");
			}

      if (
        widgetsContainer &&
        !widgetsContainer.hasAttribute("data-lenis-prevent")
      ) {
        widgetsContainer.setAttribute("data-lenis-prevent", "");
        console.log("✅ Added data-lenis-prevent to widgets container");
        return true;
      }

			return false;
		}

		/**
		 * Wait for the editor container to be available and add the attribute
		 */
		function waitForEditor() {
			// Try to add the attribute immediately
			if (addLenisPrevent()) {
				return;
			}

			// If not found, use MutationObserver to watch for DOM changes
			const observer = new MutationObserver((mutations) => {
				for (const mutation of mutations) {
					if (mutation.type === "childList") {
            console.log("body mutated")
						if (addLenisPrevent()) {
							observer.disconnect();
							return;
						}
					}
				}
			});

			// Start observing
			observer.observe(document.body, {
				childList: true,
				subtree: true,
			});
		}

		/**
		 * Initialize when DOM is ready
		 */
		function initialize() {
			if (document.readyState === "loading") {
				document.addEventListener("DOMContentLoaded", waitForEditor);
			} else {
				// DOM is already loaded
				waitForEditor();
			}
		}

			initialize();
	})();
