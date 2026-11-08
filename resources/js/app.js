import './bootstrap';

const navigationToggle = document.querySelector('.nav-toggle');
const navigationContent = document.querySelector('#primary-navigation');

if (navigationToggle && navigationContent) {
    const closeNavigation = () => {
        navigationToggle.setAttribute('aria-expanded', 'false');
        navigationToggle.setAttribute('aria-label', 'Buka menu navigasi');
        navigationContent.classList.remove('is-open');
    };

    navigationToggle.addEventListener('click', () => {
        const isOpen = navigationToggle.getAttribute('aria-expanded') === 'true';
        navigationToggle.setAttribute('aria-expanded', String(!isOpen));
        navigationToggle.setAttribute('aria-label', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
        navigationContent.classList.toggle('is-open', !isOpen);
    });

    navigationContent.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            closeNavigation();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeNavigation();
        }
    });
}

const pronunciationTargets = document.querySelectorAll('[data-pronunciation-content]');
const japaneseTextPattern = /[\u3040-\u30ff\u3400-\u4dbf\u4e00-\u9fff々ー]+/g;

for (const target of pronunciationTargets) {
    const textNodes = [];
    const walker = document.createTreeWalker(target, NodeFilter.SHOW_TEXT);

    while (walker.nextNode()) {
        textNodes.push(walker.currentNode);
    }

    for (const textNode of textNodes) {
        const text = textNode.textContent ?? '';
        const matches = [...text.matchAll(japaneseTextPattern)];

        if (matches.length === 0) {
            continue;
        }

        const fragment = document.createDocumentFragment();
        let lastIndex = 0;

        for (const match of matches) {
            const japaneseText = match[0];
            const start = match.index ?? 0;

            fragment.append(text.slice(lastIndex, start));
            fragment.append(japaneseText);

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-sm btn-outline-secondary pronunciation-button ms-1 py-0';
            button.dataset.pronunciation = japaneseText;
            button.setAttribute('aria-label', `Dengarkan pelafalan ${japaneseText}`);
            button.textContent = '🔊';
            fragment.append(button);

            lastIndex = start + japaneseText.length;
        }

        fragment.append(text.slice(lastIndex));
        textNode.replaceWith(fragment);
    }
}

document.addEventListener('click', (event) => {
    const button = event.target.closest('[data-pronunciation]');

    if (!button) {
        return;
    }

    const status = button.closest('article')?.querySelector('[data-pronunciation-status]');

    if (!('speechSynthesis' in window) || !('SpeechSynthesisUtterance' in window)) {
        if (status) {
            status.textContent = 'Fitur audio belum didukung oleh browser ini.';
        }

        return;
    }

    const utterance = new SpeechSynthesisUtterance(button.dataset.pronunciation);
    utterance.lang = 'ja-JP';
    utterance.rate = 0.85;

    const japaneseVoice = window.speechSynthesis
        .getVoices()
        .find((voice) => voice.lang.toLowerCase().startsWith('ja'));

    if (japaneseVoice) {
        utterance.voice = japaneseVoice;
    }

    if (status) {
        status.textContent = `Memutar pelafalan: ${button.dataset.pronunciation}`;
    }

    utterance.onend = () => {
        if (status) {
            status.textContent = '';
        }
    };
    utterance.onerror = (error) => {
        if (status && error.error !== 'canceled') {
            status.textContent = 'Audio tidak dapat diputar. Periksa dukungan suara di browser atau perangkat Anda.';
        }
    };

    window.speechSynthesis.cancel();
    window.speechSynthesis.speak(utterance);
});

const quizForm = document.querySelector('[data-quiz-form]');

if (quizForm) {
    const steps = [...quizForm.querySelectorAll('[data-quiz-step]')];
    const controls = quizForm.querySelector('[data-quiz-controls]');
    const previousButton = quizForm.querySelector('[data-quiz-previous]');
    const nextButton = quizForm.querySelector('[data-quiz-next]');
    const submitButton = quizForm.querySelector('[data-quiz-submit]');
    const progress = quizForm.querySelector('[data-quiz-progress]');
    const progressFill = progress?.querySelector('span');
    const counter = quizForm.querySelector('[data-quiz-count]');
    const status = quizForm.querySelector('[data-quiz-status]');
    let activeStep = 0;

    if (steps.length > 0 && controls && previousButton && nextButton && submitButton && progress && progressFill && counter) {
        controls.hidden = false;

        const showStep = (index) => {
            activeStep = index;
            steps.forEach((step, stepIndex) => {
                step.hidden = stepIndex !== activeStep;
            });

            const currentNumber = activeStep + 1;
            const percentage = (currentNumber / steps.length) * 100;
            counter.textContent = `SOAL ${String(currentNumber).padStart(2, '0')} DARI ${String(steps.length).padStart(2, '0')}`;
            progress.setAttribute('aria-valuenow', String(currentNumber));
            progressFill.style.width = `${percentage}%`;
            previousButton.disabled = activeStep === 0;
            nextButton.hidden = activeStep === steps.length - 1;
            submitButton.hidden = activeStep !== steps.length - 1;

            if (status) {
                status.textContent = `Pertanyaan ${currentNumber} dari ${steps.length}`;
            }
        };

        previousButton.addEventListener('click', () => {
            if (activeStep > 0) {
                showStep(activeStep - 1);
            }
        });

        nextButton.addEventListener('click', () => {
            const answer = steps[activeStep].querySelector('input[type="radio"]:checked');

            if (!answer) {
                const firstOption = steps[activeStep].querySelector('input[type="radio"]');
                if (status) {
                    status.textContent = 'Pilih satu jawaban sebelum melanjutkan.';
                }
                firstOption?.focus();
                return;
            }

            if (activeStep < steps.length - 1) {
                showStep(activeStep + 1);
            }
        });

        showStep(activeStep);
    }
}
