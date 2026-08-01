### Hey there 👋

I'm **Denis Smetannikov** - Senior Engineering Manager & Staff Engineer at [billups](https://billups.com) (US ad-tech, remote). I lead a distributed team of DS/DE engineers and own a multi-region, petabyte-scale Databricks platform: PySpark, Delta Lake, Unity Catalog, work with PB of data.

I've been hands-on with LLMs since 2022 an early beta tester of the first GitHub Copilot versions, and since 2024 **applied AI/LLM engineering** is my technical center of gravity: RAG with measured evaluation, LangGraph agents, speech recognition, LLM cost engineering, and spec-driven AI-assisted development (Claude Code first; GPT, DeepSeek and local models behind a self-hosted LiteLLM gateway). I like decisions backed by numbers: golden sets before "vibes", WER benchmarks before model choices, cost per request before scale. Read first, prompt second.

Total stars: [![Total stars](https://img.shields.io/github/stars/SmetDenis?affiliations=OWNER,COLLABORATOR,ORGANIZATION_MEMBER&style=flat&label=Total%20stars&logo=github&color=blue)](https://github.com/SmetDenis)
[![wakatime](https://wakatime.com/badge/user/02b2de7a-ff2a-4826-903e-03446328a0d4.svg)](https://wakatime.com/@02b2de7a-ff2a-4826-903e-03446328a0d4) last 365 days

```clojure
{:name   "Denis Smetannikov"
 :role   ["Senior Engineering Manager" "Staff Engineer"]        ; hands-on player-coach
 :own    {:platform [:databricks :multi-region :petabyte-scale]
          :ai       [:rag :langgraph :asr :llm-cost-engineering]}
 :like   ["Python" "Databases" "Spark" "Clojure" "Go" "PHP"
          "SICP" `:code-as-data  `:infrastructure-as-data
          "Factorio" ["QMK" "Vial"]]
 :make   (->> [:business :idea ::state ::legacy-code]
              (filter bad-practices?)
              (some enchantments)
              (do-it stateless)
              (profit! as-money :your @pocket))}                ; It just works!
```

Sometimes I build things for my own convenience and share them with the world.

| Project                                                                                      | What it is                                                                                                                                                                                                              |
|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [JBZoo](https://github.com/JBZoo)                                                            | 25 PHP packages maintained since 2013 - 14M+ installs on Packagist (~128k/month today), 1.5k+ GitHub stars across the ecosystem. Busiest one: [Mermaid-PHP](https://github.com/JBZoo/Mermaid-PHP) (~28k installs/month) |
| [CSV Blueprint](https://github.com/JBZoo/CSV-Blueprint)                                      | Declarative CSV validator - data contracts as YAML schemas, born from real data-platform work                                                                                                                           |
| [GigaAM (OpenAI API Server](https://github.com/SmetDenis/gigaam-openai-api-server)           | OpenAI-compatible Russian ASR server: Silero VAD chunking for long audio, Docker-first                                                                                                                                  |
| [Ollama to OpenAI](https://github.com/SmetDenis/ollama-to-openai)                            | Ollama→OpenAI translation proxy: per-model config, Jinja2 prompt templating, hot-reload                                                                                                                                 |
| [OWUI Token&money Usage Display](https://github.com/SmetDenis/openwebui-token-usage-display) | Open WebUI plugin: token, context, timing and cost per message - 5k+ installs, highlighted in the [official community docs](https://docs.openwebui.com/features/extensibility/community/)                               |
| [Prompt Engineering framework](https://github.com/SmetDenis/Prompts)                         | Production prompt collection (★100+) + the Ultimate Prompt Architect                                                                                                                                                    |
| [Obsidian: date-manager](https://github.com/SmetDenis/obsidian-frontmatter-date-manager)     | Obsidian plugin in the official community catalog                                                                                                                                                                       |

<details>
  <summary>Thank you SICP</summary>

```js
const iter = (list, time, greyMatterAcc)
    => (experiment)
    => (f, ...k)
    => (rtfm)
    => iter(sicp(list, lisp(λ)), time(--x), ++greyMatterAcc);

let youllNeverBeTheSame = iter(hexletCourses, yourTime, aLittleBitOfBrain);
```

</details>
